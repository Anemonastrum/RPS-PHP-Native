<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/style/style.css" />
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #d9d9d9;">
  <div class="card p-4">
    <div class="row">
      <div class="col-lg-6">
        <div class="banner align-items-center justify-content-center d-flex p-4">
          <img class="image-fluid" style="max-width: 400px; max-height: 400px; padding: 20px;" src="../assets/icons/logo.png" alt="Banner">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="align-items-center justify-content-center p-4 mt-4">
          <h2 class="mb-4 mt-4" style="font-weight: 700;">Register Account</h2>
          <form action="assets/php/pr_register.php" method="POST">
          <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
              <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" style="height: 50px;">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-gear"></i>
              </span>
              <input name="nim" type="text" class="form-control" id="nim" placeholder="NIM" style="height: 50px;">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-at"></i>
              </span>
              <input name="username" type="text" class="form-control" id="username" placeholder="Username" style="height: 50px;">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
              <input name="password" type="password" class="form-control" id="password" placeholder="Password" style="height: 50px;">
            </div>
            <button type="submit" id="loginButton" class="btn btn-dark" style="width: 200px; height: 40px;">Register</button>
          </form>
          <h6 class="mt-2">OR</h4>
          <a href="login.php"><button id="registerButton" class="btn btn-dark" style="width: 200px; height: 40px;">Login Now</button></a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>