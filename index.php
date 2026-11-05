<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>FindMyPG - Student Accommodation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary px-3">
  <b class="text-white">FindMyPG</b>
  <span>
<?php if(isset($_SESSION['user_id'])){ ?>
  Welcome, <?php echo $_SESSION['user_name']; ?> | <a class="text-white" href="logout.php">Logout</a>
<?php } else { ?>
  <a class="text-white" href="login.php">Login</a> | <a class="text-white" href="signup.php">Signup</a>
<?php } ?>
</span>
</nav>

<div class="container mt-4">
  <h3>Search PG in your city</h3>
  <div class="row g-2 mb-3">
    <div class="col-md-3">
      <select id="city" class="form-control" onchange="loadProperties()">
        <option value="">All Cities</option>
        <option>Mumbai</option><option>Panvel</option><option>Pune</option>
      </select>
    </div>
    <div class="col-md-3">
      <select id="gender" class="form-control" onchange="loadProperties()">
        <option value="">All Gender</option>
        <option>Girls</option><option>Boys</option><option>Co-Living</option>
      </select>
    </div>
    <div class="col-md-3">
      <input id="budget" type="number" class="form-control" placeholder="Max Budget e.g. 8000" oninput="loadProperties()">
    </div>
    <div class="col-md-3"><button class="btn btn-primary w-100" onclick="loadProperties()">Search</button></div>
  </div>

  <div id="list" class="row"></div>
</div>

<script src="assets/js/main.js"></script>
</body>
</html>