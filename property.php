<?php
include 'config/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM properties WHERE id=$id");
$p = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $p['name']; ?> - FindMyPG</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary px-3">
  <a class="text-white text-decoration-none" href="index.php"><b>FindMyPG</b></a>
</nav>

<div class="container mt-4">
  <a href="index.php" class="btn btn-secondary btn-sm mb-3">Back to Search</a>
  <div class="card p-4">
    <h3><?php echo $p['name']; ?></h3>
    <p><b>City:</b> <?php echo $p['city']; ?> | <b>Gender:</b> <?php echo $p['gender']; ?> | <b>Rating:</b> ⭐ <?php echo $p['rating']; ?></p>
    <h4 class="text-primary">Rs.<?php echo $p['price']; ?>/mo</h4>
    <p><?php echo $p['description']; ?></p>
    <hr>
    <p><b>Facilities:</b> WiFi, Food, Laundry, Water, Electricity</p>
    <a class="btn btn-danger" href="api/interest.php?id=<?php echo $p['id']; ?>">❤ Interested</a>
  </div>
</div>

<?php if (isset($_GET['saved'])) { ?>
<script>alert('Interest Saved! Owner will contact you soon.');</script>
<?php } ?>

</body>
</html>