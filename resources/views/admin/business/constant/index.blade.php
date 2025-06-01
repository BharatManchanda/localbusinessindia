@include("constant.api")
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    const createOrEdit = {
        formData: {
            id: "",
            title: "",
            parent_id:0,
            slug: "",
            icon: "",
            status: 0,
            is_visible_on_home: 0,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        errors:{},
        loading: false,
        reset : () => {
            createOrEdit.formData = {
                id: "",
                title: "",
                parent_id: 0,
                slug: "",
                icon: "",
                status: 0,
                is_visible_on_home: 0,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        assignInitValue: (formData = null) => {
            const modalTitle = document.querySelector("#create-business .modal-title"); 
            if (formData == null) {
                createOrEdit.reset();
                formData = createOrEdit.formData;
                modalTitle.innerText = "Create business";
            } else  {
                modalTitle.innerText = "Edit business";
            }
            createOrEdit.formData = {
                ...createOrEdit.formData,
                ...formData,
            };
            document.getElementById("id").value = formData.id ?? "";
            document.getElementById("title").value = formData.title ?? "";
            document.getElementById("parent_id").value = formData.parent_id ?? "";
            document.getElementById("slug").value = formData.slug ?? "";
            document.getElementById("icon").value = formData.icon ?? "";
            document.getElementById("status").value = formData.status ?? 0;
            document.getElementById("is_visible_on_home").checked = formData.is_visible_on_home == 1;
        },
        populateError: () => {
            document.getElementById("titleHelpInline").innerHTML = createOrEdit.errors.title ?? "";
            document.getElementById("parentIdHelpInline").innerHTML = createOrEdit.errors.parent_id ?? "";
            document.getElementById("iconHelpInline").innerHTML = createOrEdit.errors.icon ?? "";
            document.getElementById("slugHelpInline").innerHTML = createOrEdit.errors.slug ?? "";
            document.getElementById("statusHelpInline").innerHTML = createOrEdit.errors.status ?? "";
            document.getElementById("isVisibleOnHomeHelpInline").innerHTML = createOrEdit.errors.is_visible_on_home ?? "";
        },
        setError:(error) => {
            createOrEdit.errors=error
            createOrEdit.populateError();

        },
        onChange: (key, value) => {
            createOrEdit.formData[key] = value;
        },
        toggleButton: () => {
            const saveBtn = document.getElementById("save-btn");
            const loadingSpinner = document.getElementById("create-or-edit-loading");

            if (createOrEdit.loading) {
                saveBtn.disabled = true;
                loadingSpinner.classList.remove("d-none");
            } else {
                saveBtn.disabled = false;
                loadingSpinner.classList.add("d-none");
            }
        },
        onSubmit: async () => {
            try {
                createOrEdit.loading = true;
                createOrEdit.toggleButton();
                let response = await api.admin.business.save(createOrEdit.formData);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
                list.fetch();
                var modal = bootstrap.Modal.getInstance(document.getElementById("create-business"));
                modal.hide();
                showToast(response.message, 'primary');
            } catch (error) {
                console.log(error,"::errorerrorerror");
                
                createOrEdit.setError(error.errors);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
            }
        }
    }

    const list = {
        formData: {
            page: 1,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        loading: false,
        onChange: (key, value) => {
            list.formData[key] = value;
            list.fetch();
        },
        toggleAccordion:(id) => {
            let accordion = document.querySelector(`#accordion-${id}`);
            let icon = document.querySelector(`#toggle-icon-${id}`);

            if (accordion.classList.contains('show')) {
                accordion.classList.remove('show');
                icon.classList.remove('bi-chevron-down');
                icon.classList.add('bi-chevron-right');
            } else {
                accordion.classList.add('show');
                icon.classList.remove('bi-chevron-right');
                icon.classList.add('bi-chevron-down');
            }
        },
        
        populate: (business) => {
            console.log(business,"::business");
            
            let html = business.data.map((business, key) => {
                return (
                    `<tr>
                        <td>${business.id}</td>
                        <td>${business.name}</td>
                        <td>${business.phone}</td>
                        <td>${business.city}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" ${business.status == 1 ? 'checked' : ''} onclick="changeStatus.onClick(${business.id}, this.checked ? true : false)" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 cursor-pointer">
                                <i class="bi bi-eye"></i>
                                <i class="bi bi-trash3" data-bs-toggle="modal" data-bs-target="#delete-business" onclick='deletebusiness.onOpen(${business.id})'></i>
                            </div>
                        </td>
                    </tr>
                    `
                );
            }).join('');
            console.log(html);
            
            business.data.length == 0 && (html = `<tr><td colspan="7" class="text-center">No data found</td></tr>`)
            document.querySelector("#business-list").innerHTML = html;
        },

        populatePagination: (categories) => {
            let html = categories.links.map(link => {
                let page = null;
                if (link.url) {
                    const url = new URL(link.url);
                    page = new URLSearchParams(url.search).get('page');
                }

                return (`
                    <li class="page-item ${link.active ? "active" : ""} ${link.url == null ? "disabled" : ""}">
                        <a class="page-link" href="#" onclick="(event => { event.preventDefault(); list.onChange('page', ${page}); })(event)">${link.label}</a>
                    </li>
                `);
            }).join("");
            document.querySelector("#categories-pagination").innerHTML = html;
        },

        fetch: async () => {
            try {
                list.loading = true;
                let response = await api.admin.business.list(list.formData);
                list.populate(response.data.business)
                list.populatePagination(response.data.business)
                list.loading = false;
            } catch (error) {
                list.loading = false;
            }
        }
    }

    const deletebusiness = {
        formData: {
            id: 0,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        loading: false,
        onOpen: (id) => {
            deletebusiness.formData.id = id;
        },
        delete: async () => {
            try {
                deletebusiness.loading = true;
                let response = await api.admin.business.delete(deletebusiness.formData);
                list.fetch();
                var modal = bootstrap.Modal.getInstance(document.getElementById("delete-business"));
                showToast(response.message, 'primary');
            } catch (error) {
                deletebusiness.loading = false;
            }
        }
    }
    const changeStatus = {
        formData: {
            id: 0,
            status: 0,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        loading: false,
        onClick: (id, status) => {
            changeStatus.formData.id = id;
            changeStatus.formData.status = status;
            changeStatus.updateStatus();
        },
        updateStatus: async () => {
            try {
                changeStatus.loading = true;
                let response = await api.admin.business.updateStatus(changeStatus.formData);
                changeStatus.loading = false;
                showToast(response.message, 'primary');
            } catch (error) {
                changeStatus.loading = false;
            }
        }
    }
</script>