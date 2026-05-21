<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
  header('Location: login.php');
  exit();
  }
include '../inc/header.php';
include '../inc/dbconnect.php';
?>
<div class="container mt-5">
    <h2>Reserveeringud</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Auto</th>
                <th>Kasutaja</th>
                <th>Algus</th>
                <th>Lõpp</th>
                <th>Staatus</th>
                <th>Hind (€)</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM reservations";
        $result = $conn->query($sql);

        if (!$result) {
            echo "<tr><td colspan='7'>Viga: " . $conn->error . "</td></tr>";
        } elseif ($result->num_rows == 0) {
            echo "<tr><td colspan='7'>Pole reserveeringuid</td></tr>";
        } else {
            while ($row = $result->fetch_assoc()) {

                $badge = "secondary";
                if ($row['status'] == 'confirmed') $badge = "success";
                if ($row['status'] == 'pending') $badge = "warning";
                if ($row['status'] == 'cancelled') $badge = "danger";

                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['car_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['start_date']}</td>
                    <td>{$row['end_date']}</td>
                    <td><span class='badge bg-$badge'>{$row['status']}</span></td>
                    <td>{$row['total_price']}</td>
                </tr>";
            }
        }
        ?>

        </tbody>
    </table>
</div>

<?php include '../inc/footer.php'; ?>