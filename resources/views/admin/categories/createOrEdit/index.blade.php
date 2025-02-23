@include("admin.categories.constant.index")
<x-modal id="create-category" title="Create Category">
    @csrf
    <input type="hidden" class="form-control" id="id" oninput="createOrEdit.onChange('id', this.value)">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" oninput="createOrEdit.onChange('title', this.value)">
        <span id="titleHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="parent_id" class="form-label">Parent</label>
        <select class="form-select" id="parent_id" aria-label="Default select example" onchange="createOrEdit.onChange('parent_id', this.value)">
        </select>
        <span id="parentIdHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Icon</label>
        <input type="text" class="form-control" id="icon" placeholder="Enter Icon" oninput="createOrEdit.onChange('icon', this.value)">
        <span id="iconHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" placeholder="Enter slug" oninput="createOrEdit.onChange('slug', this.value)">
        <span id="slugHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" aria-label="Default select example" onchange="createOrEdit.onChange('status', this.value)">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <span id="statusHelpInline" class="form-text text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="is_visible_on_home" class="form-label">Visible on Home</label>
        <input type="checkbox" id="is_visible_on_home" class="form-check-input" onchange="createOrEdit.onChange('is_visible_on_home', this.checked ? 1 : 0)">
        <span id="isVisibleOnHomeHelpInline" class="form-text text-danger"></span>
    </div>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="save-btn" class="btn btn-primary" type="button" onclick="createOrEdit.onSubmit()">
            <span id="create-or-edit-loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            Save
        </button>
    </x-slot>
</x-modal>