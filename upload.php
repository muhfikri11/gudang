<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gudang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
if(isset($_POST["submit"])) {
    if($_FILES['file']['name']) {
        
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $nama = $data[0];
            $jumlah = $data[1];
            $harga = $data[2];
            $sql = "INSERT INTO barang (nama, jumlah, harga) VALUES ('$nama', '$jumlah', '$harga')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        fclose($handle);
        echo "Data berhasil diimpor ke database.";
    } else {
        echo "Silakan pilih file CSV.";
    }
}
$conn->close();
?>
