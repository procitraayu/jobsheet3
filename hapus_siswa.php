<?
include 'koneksi.php';

if(isset($_GET['id'])) {
    $is_siswa = $_GET['id'];

    $query = "DELETE FROM siswa WHERE id_siswa = $is_siswa";
    if(mysqli_query($koneksi, $query)) {
        header("location: index.php");
        exit();
    }else{
        echo "<Error: " .mysli_error($koneksi);
    }
    }else{
        header("location: index.php");
        exit();
    }
