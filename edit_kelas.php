<!DOCTYPE html>
<html lang="id">
    <head>

    <title>Edit Kelas</title>
</head>
<body>
    <h2>Edit Data Kelas</h2>
    <form method="POST">
        <LABEL >Nama Kelas</label>
        <input type="text" name="nama_kelas" value="<?php echo $id_kelas['nama_kelas']; ?>" required>
</div>
<button type="submit">Update</button>
<a href="index.php">Batal</a>
</form>

</body>
</html>

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    $query = "SELECT * FROM id_kelas WHERE id_kelas = $id_kelas";
    $result = mysqli_query($koneksi, $query);
    $id_kelas = mysqli_fetch_assoc($result);

}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kelas = $_POST['nama_kelas'];
    $query_update = "UPDATE id_kelas SET nama_kelas= '$nama_kelas' WHERE id_kelas=$id_kelas";

    if(mysqli_query($koneksi, $query_update)) {
        header("location: kelas.php");
        exit();
    }else{
        echo "Error: " .mysqli_error($koneksi);
    }
    }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kelas = $_POST['nama_kelas'];
    $query_update = "UPDATE id_kelas SET nama_kelas='$nama_kelas' WHERE id_kelas=$id_kelas";
     
    if(mysqli_query($koneksi, $query_update)) {
        header("Location: kelas.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($koneksi);
    }
    }
?>
 