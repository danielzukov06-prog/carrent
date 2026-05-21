<?php
require 'db.php';
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $password);
    $stmt->execute();

    echo "Kasutaja loodud!";
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Nimi" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Parool" required>
    <button type="submit">Registreeri</button>
    <a href="/carrent/public/index.php" class="btn btn-secondary">Tagasi</a>
</form>