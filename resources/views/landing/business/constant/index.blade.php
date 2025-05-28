@include("constant.api")
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    const createOrEdit = {
        formData: {
            id: null,
            name: "",
            email: "",
            phone: "",
            website: "",
            category_id: "",
            sub_category_id: "",
            city: "",
            business_address: "",
            instagram_url: "",
            facebook_url: "",
            business_logo: "",
            declaration: 0,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        errors:{},
        loading: false,
        reset : () => {
            createOrEdit.formData = {
                id: null,
                name: "",
                email: "",
                phone: "",
                website: "",
                category_id: "",
                sub_category_id: "",
                city: "",
                business_address: "",
                instagram_url: "",
                facebook_url: "",
                business_logo: "",
                declaration: 0,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        populateError: () => {
            document.getElementById("nameHelpInline").innerHTML = createOrEdit.errors.name ?? "";
            document.getElementById("emailHelpInline").innerHTML = createOrEdit.errors.email ?? "";
            document.getElementById("phoneHelpInline").innerHTML = createOrEdit.errors.phone ?? "";
            document.getElementById("category_idHelpInline").innerHTML = createOrEdit.errors.category_id ?? "";
            document.getElementById("sub_category_idHelpInline").innerHTML = createOrEdit.errors.sub_category_id ?? "";
            document.getElementById("cityHelpInline").innerHTML = createOrEdit.errors.city ?? "";
            document.getElementById("business_addressHelpInline").innerHTML = createOrEdit.errors.business_address ?? "";
            document.getElementById("instagram_urlHelpInline").innerHTML = createOrEdit.errors.instagram_url ?? "";
            document.getElementById("facebook_urlHelpInline").innerHTML = createOrEdit.errors.facebook_url ?? "";
            document.getElementById("business_logoHelpInline").innerHTML = createOrEdit.errors.business_logo ?? "";
            document.getElementById("declarationHelpInline").innerHTML = createOrEdit.errors.declaration ?? "";
        },
        setError:(error) => {
            createOrEdit.errors=error
            createOrEdit.populateError();
        },
        onChange: (key, value) => {
            createOrEdit.formData[key] = value;
            if (key === 'category_id') {
                createOrEdit.formData.sub_category_id = "";
                createOrEdit.subCatgoriesSet();
            }
        },
        subCatgoriesSet: () => {
            let found = null;
            for (let i=0; i < createOrEdit.categoryData.length; i++) {
                if (createOrEdit.categoryData[i].id == createOrEdit.formData.category_id) {
                    found = createOrEdit.categoryData[i];
                    break;
                }
            }
            const subcategorySelect = document.getElementById('sub_category_id');
            subcategorySelect.innerHTML = '<option value="" selected disabled>Business Sub category *</option>';

            if (found) {
                found.children.forEach(function (sub) {
                    const option = document.createElement('option');
                    option.value = sub.id;
                    option.textContent = sub.title;
                    subcategorySelect.appendChild(option);
                });
            }
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
                let response = await api.landing.business.save(createOrEdit.formData);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
                showToast(response.message, 'primary');
            } catch (error) {
                createOrEdit.setError(error.errors);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
            }
        }
    };

    const list = {
        formData: {
            page: 1,
            rowPerPage: 10,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        loading: false,
        populate: (businesses) => {
            let html = businesses.data.data.map((business, key) => {
                return (`
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="img/card-img.jpg" class="img-fluid rounded-start" alt="Electrician">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">${business.name}</h5>
                                    <p class="card-text">Main Road Mohali Sector 91</p>
                                    <span class="badge bg-orange text-white me-2">3.8 ⭐ (10)</span>
                                    <span class="text-success fw-bold">✔ Verified</span>
                                    <div class="mt-3">
                                        <button class="btn btn-success btn-sm me-2">📞 0123456789</button>
                                        <button class="btn btn-warning btn-sm">Send Enquiry</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
            }).join(``);

            businesses.data.data.length == 0 && (html = `<tr><td colspan="7" class="text-center">No business exists!</td></tr>`)
            document.querySelector("#business-list").innerHTML = html;
        },
        fetch: async () => {
            try {
                list.loading = true;
                let response = await api.landing.business.list(list.formData);
                list.populate(response)
            } catch (error) {

            }
        }
    }
</script>