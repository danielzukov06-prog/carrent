<?php
include "db.php";

$result = $conn->query("SELECT * FROM cars");
?>

<h1>Autod</h1>

<?php while ($car = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <h3><?= $car['mark'] ?> <?= $car['model'] ?></h3>
        <p><?= $car['price'] ?> € / päev</p>

        <a href="booking.php?id=<?= $car['id'] ?>">
            Broneeri
        </a>
    </div>
<?php endwhile; ?>