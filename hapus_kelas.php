<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];

    
    $cek_query = "SELECT COUNT(*) AS total FROM siswa WHERE id_kelas";
    $cek_result = mysqli_query($koneksi, $cek_query);
    $cek_row = mysqli_fetch_assoc($cek_result);

    if ($cek_row['total'] > 0) {} {
        echo "<script>
        alert('Kelas tidak dapat dihapus karena masih ada siswa yang terdaftar di kelas ini. ');
        window.location.href='kelas.php';
        </script>";
        exit();
    }


    $query = "DELETE FROM id_kelas WHERE id_kelas = $id_kelas";
    if (mysqli_query($koneksi, $query)) {
        hwader("location: kelas.php");
        exit();
    }else{
        echo "<script>
        alert('Error: ". mysqli_error($koneksi);
    }
    } else {
        header("location: kelas.php");
        exit();
    }
?>