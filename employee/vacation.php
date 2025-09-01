<div class="modal fade" id="buttonRequest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title-modal" id="NewUserModal">Vacation request</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="vacationRequestForm" method="POST" action="saveVacationRequest.php">
                    <div class="mb-3">
                        <label for="dateFrom" class="form-label">Date from</label>
                        <input type="text" class="form-control" id="dateFrom" name="date_from" placeholder="/ / /" require>
                    </div>
                    <div class="mb-3">
                        <label for="dateTo" class="form-label">Date to</label>
                        <input type="text" class="form-control" id="dateTo" name="date_to" placeholder="/ / /" require>
                    </div>
                    <div class="mb-3 d-flex align-items-start">
                        <label for="reason" class="form-label reason">Reason</label>
                        <textarea name="reason" class="form-control" id="reason" rows="5" cols="50" require></textarea>
                    </div>
                    <div class="modal-footer">
                        <button id="submit" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="vacation.js"></script>