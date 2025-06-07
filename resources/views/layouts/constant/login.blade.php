@include("constant.api")
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    const login = {
        formData: {
            email: "",
            password: "",
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        errors:{},
        loading: false,
        reset : () => {
            login.formData = {
                email: "",
                password: "",
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        assignInitValue: (formData = null) => {
            const modalTitle = document.querySelector("#create-business .modal-title"); 
            login.reset();
            document.getElementById("email").value = formData.id ?? "";
            document.getElementById("password").value = formData.title ?? "";
        },
        populateError: () => {
            document.getElementById("emailHelpInline").innerHTML = login.errors?.email ?? "";
            document.getElementById("passwordHelpInline").innerHTML = login.errors?.password ?? "";
        },
        setError:(error) => {
            login.errors=error
            login.populateError();
        },
        onChange: (key, value) => {
            login.formData[key] = value;
        },
        toggleButton: () => {
            const saveBtn = document.getElementById("login-btn");
            const loadingSpinner = document.getElementById("login-loading");
            if (login.loading) {
                saveBtn.disabled = true;
                loadingSpinner.classList.remove("d-none");
            } else {
                saveBtn.disabled = false;
                loadingSpinner.classList.add("d-none");
            }
        },
        updateUserSection: async(data) => {
            let innerhtml = ``;
            if (data.role === "admin") {
                innerhtml = `
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.dashboard.view') }}">
                            <i class="fa-solid fa-gauge me-2"></i>Dashboard
                        </a>
                    </li>`;
            } else if (data.role === "business") {
                innerhtml = `<li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                </li>`;
            }
            innerhtml += `
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>`;

            let html = `
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-2 fs-4"></i>
                        <span class="text-capitalize"${data.name}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        ${innerhtml}
                    </ul>
                </div>
            `;
            document.querySelector("#user-section").innerHTML = html;
            if (data.role === "admin") {
                let link = "{{route('admin.dashboard.view') }}";
                // console.log();
                
                window.location.replace(link);
            }
        },
        onSubmit: async () => {
            try {
                login.loading = true;
                login.toggleButton();
                let response = await api.auth.login(login.formData);
                login.loading = false;
                login.toggleButton();
                var modal = bootstrap.Modal.getInstance(document.getElementById("login-form"));
                modal.hide();
                showToast(response.message, 'primary');
                login.updateUserSection(response.user);
            } catch (error) {
                showToast(error.message, 'primary');
                login.setError(error.errors);
                login.loading = false;
                login.toggleButton();
            }
        }
    }
</script>