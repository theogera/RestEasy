<div class="modal fade" id="deleteRequestModal" tabindex="-1" aria-labelledby="deleteRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRequestModalLabel">Delete Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteRequestForm" method="POST" action="deleteVacationRequest.php">
                <div class="modal-body">
                    <div style="text-align: center; padding-bottom: 6%;">Are you sure want to delete request?</div>
                    <strong>Reason:</strong> <span id="deleteRequestReason"></span><br>
                    <strong>Dates requested:</strong> <span id="deleteRequestTotalDays"></span>
                    <input type="hidden" name="id" id="requestId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="deleteVacationRequestModal.js"></script>