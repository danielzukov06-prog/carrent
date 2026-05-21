<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
  header('Location: login.php');
  exit();
  }

?>
<?php include('../inc/config.php'); ?>
<?php include('../inc/header.php'); ?>
<?php
    if(!empty($_GET)){
       $mark = $_GET['mark'];
       $model = $_GET['model'];
       $engine = $_GET['engine'];
       $fuel = $_GET['fuel'];
       $price = $_GET['price'];
       $year = $_GET['year'];
       $transmission = $_GET['transmission'];
       $seats = $_GET['seats'];
       $description = $_GET['description'];
       $status = $_GET['status'];
       $sql = "INSERT INTO cars (mark, model, engine, fuel, price, year, transmission, seats, description, status) VALUES ('".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$year."', '".$transmission."', '".$seats."', '".$description."', '".$status."')";
       $valjund = mysqli_query($yhendus, $sql); 
       $tulemus = mysqli_affected_rows($yhendus);
        if ($tulemus == 1) {
            header("Location: index.php?msg=lisatud");
        } else {
            echo "Kirjet ei lisatud";
        }


    }
?>
<div class="container">
    <h2>Auto lisamine</h2>
    <form action="lisa.php" method="get">
        <div class="row g-4">
            <div class="col-sm-6">
                <label for="mark" class="form-label">Mark</label>
                <input type="text" class="form-control" id="mark" name="mark" value="">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="">
                <label for="engine" class="form-label">Mootor</label>
                <input type="text" class="form-control" id="engine" name="engine" value="">
                <label for="fuel" class="form-label">Kütus</label>
                <input type="text" class="form-control" id="fuel" name="fuel" value="">
                <label for="price" class="form-label">Hind</label>
                <input type="number" class="form-control" id="price" name="price" value="">
            </div>
            <div class="col-sm-6">
                <label for="year" class="form-label">Aasta</label>
                <input type="number" class="form-control" id="year" name="year" value="">
                <label for="transmission" class="form-label">Käigukast</label>
                <input type="text" class="form-control" id="transmission" name="transmission" value="">
                <label for="seats" class="form-label">Istmete arv</label>
                <input type="number" class="form-control" id="seats" name="seats" value="">
                <label for="description" class="form-label">Muu info</label>
                <input type="text" class="form-control" id="description" name="description" value="">
                <label for="status" class="form-label">Olek</label>
                <input type="text" class="form-control" id="status" name="status" value="">
            </div>
            <input type="submit" value="Salvesta" class="btn btn-success">
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<?php include('../inc/footer.php'); ?>