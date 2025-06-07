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
            status: 1,
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
            const modalTitle = document.querySelector("#create-category .modal-title"); 
            if (formData == null) {
                createOrEdit.reset();
                formData = createOrEdit.formData;
                modalTitle.innerText = "Create Category";
            } else  {
                modalTitle.innerText = "Edit Category";
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
            document.getElementById("titleHelpInline").innerHTML = createOrEdit.errors?.title ?? "";
            document.getElementById("parentIdHelpInline").innerHTML = createOrEdit.errors?.parent_id ?? "";
            document.getElementById("iconHelpInline").innerHTML = createOrEdit.errors?.icon ?? "";
            document.getElementById("slugHelpInline").innerHTML = createOrEdit.errors?.slug ?? "";
            document.getElementById("statusHelpInline").innerHTML = createOrEdit.errors?.status ?? "";
            document.getElementById("isVisibleOnHomeHelpInline").innerHTML = createOrEdit.errors?.is_visible_on_home ?? "";
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
                let response = await api.admin.category.save(createOrEdit.formData);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
                list.fetch();
                var modal = bootstrap.Modal.getInstance(document.getElementById("create-category"));
                modal.hide();
                showToast(response.message, 'primary');
                document.querySelector(".modal-backdrop").remove();
            } catch (error) {
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
        populate: (categories) => {
            let html = categories.data.map((category, key) => {
                return (
                    `<tr>
                        <td scope="row">
                            <i class="bi bi-chevron-right" onclick="list.toggleAccordion(${category.id})" id="toggle-icon-${category.id}" style="cursor: pointer;"></i>
                        </td>
                        <td scope="row">${category.id}</td>
                        <td>${category.title}</td>
                        <td>${category.slug}</td>
                        <td class="text-center">
                            ${category.is_visible_on_home ? '<i class="bi bi-check-lg text-success"></i>': '<i class="bi bi-x text-danger"></i>'}
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" ${category.status == 1 ? 'checked' : ''} onclick="changeStatus.onClick(${category.id}, this.checked ? true : false)" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 cursor-pointer">
                                <i class="bi bi-eye"></i>
                                <i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#create-category" onclick='createOrEdit.assignInitValue(${JSON.stringify(category)})'></i>
                                <i class="bi bi-trash3" data-bs-toggle="modal" data-bs-target="#delete-category" onclick='deleteCategory.onOpen(${category.id})'></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="p-0">
                            <div id="accordion-${category.id}" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <table class="table m-0">
                                        <tbody>
                                            ${category.children.length ? category.children.map(child => {
                                                return (
                                                    `<tr>
                                                        <td style="width: 10%"></td>
                                                        <td style="width: 10%">${child.id}</td>
                                                        <td style="width: 20%">${child.title}</td>
                                                        <td style="width: 20%">${child.slug}</td>
                                                        <td style="width: 10%" class="text-center">${child.is_visible_on_home ? '<i class="bi bi-check-lg text-success"></i>': '<i class="bi bi-x text-danger"></i>'}</td>
                                                        <td style="width: 10%">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" ${child.status == 1 ? 'checked' : ''} onclick="changeStatus.onClick(${child.id}, ${!child.status})" role="switch" id="flexSwitchCheckDefault">
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <div class="d-flex align-items-center gap-2 cursor-pointer">
                                                                <i class="bi bi-eye"></i>
                                                                <i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#create-category" onclick='createOrEdit.assignInitValue(${JSON.stringify(child)})'></i>
                                                                <i class="bi bi-trash3" data-bs-toggle="modal" data-bs-target="#delete-category" onclick='deleteCategory.onOpen(${category.id})'></i>
                                                            </div>
                                                        </td>
                                                    </tr>`
                                                );
                                            }).join('') : '<tr><td colspan="7" class="text-center">No data found</td></tr>'}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    `
                );
            }).join('');
            categories.data.length == 0 && (html = `<tr><td colspan="7" class="text-center">No data found</td></tr>`)
            document.querySelector("#categories-list").innerHTML = html;
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
        populateParent: (categories) => {
            let html = categories.data.map(category => {
                return (`
                    <option value="${category.id}">${category.title}</option>
                `)
            }).join(``);
            document.querySelector("#parent_id").innerHTML = html;
        },
        fetch: async () => {
            try {
                list.loading = true;
                let response = await api.admin.category.list(list.formData);
                list.populate(response.data.categories)
                list.populatePagination(response.data.categories)
                list.populateParent(response.data.categories)
                list.loading = false;
            } catch (error) {
                list.loading = false;
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
                let response = await api.admin.category.updateStatus(changeStatus.formData);
                changeStatus.loading = false;
                showToast(response.message, 'primary');
            } catch (error) {
                changeStatus.loading = false;
            }
        }
    }

    const deleteCategory = {
        formData: {
            id: 0,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        loading: false,
        onOpen: (id) => {
            deleteCategory.formData.id = id;
        },
        delete: async () => {
            try {
                deleteCategory.loading = true;
                let response = await api.admin.category.delete(deleteCategory.formData);
                list.fetch();
                var modal = bootstrap.Modal.getInstance(document.getElementById("delete-category"));
                showToast(response.message, 'primary');
            } catch (error) {
                deleteCategory.loading = false;
            }
        }
    }
</script>