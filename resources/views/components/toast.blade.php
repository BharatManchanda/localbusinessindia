<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 999999999999;">
    <div id="toastMessage" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessageBody">
                Success message here
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    function showToast(message, type = 'success') {
        let toastBody = document.getElementById("toastMessageBody");
        let toastElement = document.getElementById("toastMessage");

        toastBody.textContent = message;
        toastElement.classList.remove("text-bg-success", "text-bg-danger");
        toastElement.classList.add("text-bg-" + type);

        let toast = new bootstrap.Toast(toastElement, { delay: 3000 });
        toast.show();
    }
</script>