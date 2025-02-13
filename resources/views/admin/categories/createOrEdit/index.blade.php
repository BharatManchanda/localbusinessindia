<x-modal id="create-category" title="Create Category">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title">
        <span id="titleHelpInline" class="form-text"></span>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" placeholder="Enter slug">
        <span id="titleHelpInline" class="form-text"></span>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <span id="statusHelpInline" class="form-text"></span>
    </div>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>