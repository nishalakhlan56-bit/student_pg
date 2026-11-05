<?php
include 'config/db.php';
$msg = "";
if (isset($_GET['done'])) { $msg = "Account ban gaya hai, ab Login karo."; }
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($pass, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      header("Location: index.php");
      exit;
    } else {
      $msg = "Galat password hai.";
    }
  } else {
    $msg = "Ye email nahi mila, pehle Signup karo.";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - FindMyPG</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary px-3">
  <a class="text-white text-decoration-none" href="index.php"><b>FindMyPG</b></a>
</nav>
<div class="container mt-4" style="max-width:450px;">
  <div class="card p-4">
    <h3>Login</h3>
    <?php if ($msg != "") { echo "<div class='alert alert-info'>$msg</div>"; } ?>
    <form method="post">
      <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
      <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary w-100" name="login">Login</button>
    </form>
    <p class="mt-3">Naya user ho? <a href="signup.php">Signup karo</a></p>
  </div>
</div>
</body>
</html>