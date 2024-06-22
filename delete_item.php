<?php
include 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM barang WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql_update = "SET @num := 0;
            UPDATE barang SET id = @num := (@num+1);
            ALTER TABLE barang AUTO_INCREMENT = 1;";

if ($conn->multi_query($sql_update) === TRUE) {
    echo "ID berhasil diperbarui.";
} else {
    echo "Error: " . $sql_update . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>
