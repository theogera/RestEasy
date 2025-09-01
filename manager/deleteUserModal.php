<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteUserForm" method="POST" action="deleteUser.php">
                <div class="modal-body">
                    <div style="text-align: center; padding-bottom: 6%;">Are you sure you want to delete this user?</div>
                    <strong>Name:</strong> <span id="deleteRequestReason"></span><br>
                    <strong>Email:</strong> <span id="deleteRequestTotalDays"></span>
                    <input type="hidden" id="deleteUserId" name="deleteUserId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="deleteUserModal.js"></script>