<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sing in</title>
  <?php include './basic-header.php'; ?>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <form class="singIn" action="singIn.php" method="POST">
      <h1 class="singInText">Sing In</h1>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="buttonSingIn">Sing in</button>
    </form>
  </div>
</body>

</html>