<div class="modal fade" id="buttonCreateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NewUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title-modal" id="NewUserModal">User Properties</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createUserForm" method="POST" action="createNewUser.php" onsubmit="return validateForm()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="userPropertiesName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userPropertiesName" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPropertiesEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userPropertiesEmail" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPropertiesEmployeeCode" class="form-label">Employee code</label>
                        <input type="text" class="form-control" id="userPropertiesEmployeeCode" name="employee_code" placeholder="Employee code" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPropertiesPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPropertiesPassword" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="properties.js"></script>