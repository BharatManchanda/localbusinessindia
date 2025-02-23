<x-modal id="delete-category" title="Delete Category">
    <div class="mb-3">
        <div class="d-flex flex-column">
            <div class="text-center">
                <i class="bi bi-x-circle text-danger" style="font-size: 70px;"></i>
            </div>
            <p class="fs-1 text-center">Are you sure?</p>
            <p class="text-center">You want to delete this category. This action cannot be undone?</p>
        </div>
    </div>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteCategory.delete()">Delete</button>
    </x-slot>
</x-modal>