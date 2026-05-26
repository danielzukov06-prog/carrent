<?php
session_start();
include "../inc/header.php";
include "../inc/db.php";
$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();
if (!$car) {
    echo "<div class='container mt-5'>Auto ei leitud</div>";
    include "footer.php";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $check = $conn->prepare("
        SELECT id 
        FROM reservations 
        WHERE car_id = ? 
        AND status IN ('active', 'pending')
        AND (? <= end_date) 
        AND (? >= start_date)
    ");
    $check->bind_param("iss", $id, $start, $end);
    $check->execute();
    $resultCheck = $check->get_result();
    if ($resultCheck->num_rows > 0) {
        $error = "See auto on juba sellel perioodil broneeritud!";
    } else {
        $startDate = new DateTime($start);
        $endDate = new DateTime($end);
        $days = $startDate->diff($endDate)->days;
        if ($days < 1) $days = 1;
        $total_price = $days * $car['price'];
        $user_id = $_SESSION['user_id'] ?? 2;
        $stmt = $conn->prepare("
            INSERT INTO reservations
            (car_id, user_id, start_date, end_date, status, total_price)
            VALUES (?, ?, ?, ?, 'pending', ?)
        ");
        $stmt->bind_param(
            "iissd",
            $id,
            $user_id,
            $start,
            $end,
            $total_price
        );
        $stmt->execute();
        $success = "✔ Broneering edukalt loodud!";
    }
}
?>
<div class="container mt-5">
<?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>
<?php if (!empty($success)): ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-md-6">
        <img src="<?= $car['image'] ?>" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h1><?= $car['mark'] ?> <?= $car['model'] ?></h1>
        <p><strong>Mootor:</strong> <?= $car['engine'] ?></p>
        <p><strong>Kütus:</strong> <?= $car['fuel'] ?></p>
        <p><strong>Hind:</strong> €<?= $car['price'] ?> / päev</p>
        <p><strong>Aasta:</strong> <?= $car['year'] ?? '-' ?></p>
        <p><strong>Käigukast:</strong> <?= $car['transmission'] ?? '-' ?></p>
        <p><strong>Kohad:</strong> <?= $car['seats'] ?? '-' ?></p>
        <p><?= $car['description'] ?? '' ?></p>
        <button class="btn btn-success btn-lg mt-3"
                onclick="document.getElementById('bookForm').style.display='block'">
            Rendi see auto
        </button>
        <div id="bookForm" style="display:none; margin-top:20px;">
            <h4>Broneeri auto</h4>
            <form method="POST">
                <input type="date" name="start" class="form-control mb-2" required>
                <input type="date" name="end" class="form-control mb-2" required>
                <button class="btn btn-primary">
                    Kinnita broneering
                </button>
            </form>
        </div>
    </div>
</div>
</div>
<?php include "../inc/footer.php"; ?>