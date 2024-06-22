<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Barang</h1>
    <?php
        include 'database.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM barang WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <form action="update_item.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nama">Nama Barang:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <label for="jumlah">Jumlah:</label><br>
        <input type="number" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required><br>
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>


