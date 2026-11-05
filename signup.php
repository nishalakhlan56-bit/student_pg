<?php
include 'config/db.php';
$msg = "";
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = $conn->query("SELECT id FROM users WHERE email='$email'");
  if ($check->num_rows > 0) {
    $msg = "Ye email pehle se hai, Login karo.";
  } else {
    $conn->query("INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$pass', '$phone')");
    header("Location: login.php?done=1");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup - FindMyPG</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary px-3">
  <a class="text-white text-decoration-none" href="index.php"><b>FindMyPG</b></a>
</nav>
<div class="container mt-4" style="max-width:450px;">
  <div class="card p-4">
    <h3>Create Account</h3>
    <?php if ($msg != "") { echo "<div class='alert alert-danger'>$msg</div>"; } ?>
    <form method="post">
      <input class="form-control mb-2" name="name" placeholder="Your Name" required>
      <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
      <input class="form-control mb-2" name="phone" placeholder="Phone Number" required>
      <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-primary w-100" name="signup">Signup</button>
    </form>
    <p class="mt-3">Pehle se account hai? <a href="login.php">Login karo</a></p>
  </div>
</div>
</body>
</html>