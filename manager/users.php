<!DOCTYPE html>
<html lang="en">

<head>
    <title>List of users</title>
    <?php include '../basic-header.php';
    $users = get_query("SELECT * FROM list_users"); ?>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container w-70 pt-5">
        <div class="header-container">
            <h1>List of users</h1>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logOutModal">Log Out <i class="bi bi-x-lg"></i></button>
            <?php include("../logOutModal.php"); ?>
        </div>
        <button type="button" class="buttonCreateUser" data-bs-toggle="modal" data-bs-target="#buttonCreateUser">Add New User</button>
        <?php include("properties.php"); ?>
        <table id="listUsers" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><a href="editUserModal.php" class="edit-button" data-id="<?php echo $user['id']; ?>" data-name="<?php echo htmlspecialchars($user['name']); ?>" data-email="<?php echo htmlspecialchars($user['email']); ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                edit
                            </a>
                            <?php include("editUserModal.php"); ?>
                            <a class="delete-button" style="color: red; cursor: pointer; text-decoration: none;" data-id="<?php echo $user['id']; ?>" data-name="<?php echo $user['name']; ?>" data-email="<?php echo $user['email']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                delete
                            </a>
                            <?php include("deleteUserModal.php"); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="users.js"></script>
</body>
<?php include("deleteUserModal.php"); ?>

</html>