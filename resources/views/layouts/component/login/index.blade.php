<x-modal id="login-form" title="Login">
    @csrf
    <input type="hidden" class="form-control" id="id" oninput="login.onChange('id', this.value)">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" oninput="login.onChange('email', this.value)">
        <span id="emailHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" oninput="login.onChange('password', this.value)">
        <span id="passwordHelpInline" class="form-text text-danger"></span>
    </div>
    
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="login-btn" class="btn btn-primary" type="button" onclick="login.onSubmit()">
            <span id="login-loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            Login
        </button>
    </x-slot>
</x-modal>