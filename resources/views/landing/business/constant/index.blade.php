@include("constant.api")
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    const createOrEdit = {
        categoryData: @json($categories?? []),
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
            password: "",
            confirm_password: "",
            aboutus: "",
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        errors:{},
        loading: false,
        reset: () => {
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
                password: "",
                confirm_password: "",
                aboutus: "",
                declaration: 0,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            let fields = ["id", "name", "email", "phone", "website", "category_id", "sub_category_id", "city", "business_address", "instagram_url", "facebook_url", "password", "confirm_password", "aboutus"];
            fields.forEach(field => {
                const input = document.querySelector(`[name=${field}]`);
                if (input) {
                    input.value = createOrEdit.formData[field] ?? "";
                }
            });

            // Special handling for textarea
            let addressField = document.querySelector(`[name="business_address"]`);
            if (addressField) {
                addressField.value = createOrEdit.formData.business_address ?? "";
            }

            // Reset file input
            let logoInput = document.querySelector(`[name="business_logo"]`);
            if (logoInput) {
                logoInput.value = "";
            }

            // Reset checkbox
            let declarationCheckbox = document.getElementById("declaration");
            if (declarationCheckbox) {
                declarationCheckbox.checked = !!createOrEdit.formData.declaration;
            }
        },
        populateError: () => {
            document.getElementById("nameHelpInline").innerHTML = createOrEdit.errors?.name ?? "";
            document.getElementById("emailHelpInline").innerHTML = createOrEdit.errors?.email ?? "";
            document.getElementById("phoneHelpInline").innerHTML = createOrEdit.errors?.phone ?? "";
            document.getElementById("category_idHelpInline").innerHTML = createOrEdit.errors?.category_id ?? "";
            document.getElementById("sub_category_idHelpInline").innerHTML = createOrEdit.errors?.sub_category_id ?? "";
            document.getElementById("cityHelpInline").innerHTML = createOrEdit.errors?.city ?? "";
            document.getElementById("business_addressHelpInline").innerHTML = createOrEdit.errors?.business_address ?? "";
            document.getElementById("instagram_urlHelpInline").innerHTML = createOrEdit.errors?.instagram_url ?? "";
            document.getElementById("facebook_urlHelpInline").innerHTML = createOrEdit.errors?.facebook_url ?? "";
            document.getElementById("business_logoHelpInline").innerHTML = createOrEdit.errors?.business_logo ?? "";
            document.getElementById("declarationHelpInline").innerHTML = createOrEdit.errors?.declaration ?? "";
            document.getElementById("declarationHelpInline").innerHTML = createOrEdit.errors?.declaration ?? "";
            document.getElementById("passwordHelpInline").innerHTML = createOrEdit.errors?.password ?? "";
            document.getElementById("confirm_passswordHelpInline").innerHTML = createOrEdit.errors?.confirm_password ?? "";
            document.getElementById("aboutusHelpInline").innerHTML = createOrEdit.errors?.aboutus ?? "";
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
                createOrEdit.reset();
                showToast(response.message, 'primary');
            } catch (error) {
                createOrEdit.setError(error.errors);
                createOrEdit.loading = false;
                createOrEdit.toggleButton();
            }
        }
    };
</script>