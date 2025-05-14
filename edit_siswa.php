<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    $query = "SELECT * FROM siswa WHERE id_siswa = $id_siswa";
    $result = mysqli_query($koneksi, $query);
    $siswa = mysqli_fetch_assoc($result);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];

    $query_update = "UPDATE siswa SET 
                    nis = '$nis',
                    nama_siswa = '$nama_siswa', 
                    jenis_kelamin = '$jenis_kelamin', 
                    tempat_lahir = '$tempat_lahir', 
                    tanggal_lahir = '$tanggal_lahir', 
                    id_kelas = $id_kelas, 
                    id_wali = $id_wali 
                    WHERE id_siswa = $id_siswa";

    if(mysqli_query($koneksi, $query_update)){
        header("Location: index.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($koneksi);
    }    
}
$kelas_result = mysqli_query($koneksi, "SELECT * FROM id_kelas");
$wali_result = mysqli_query($koneksi, "SELECT * FROM wali_murid");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"
<meta name="viewposrt" content= "widht=device_width, initial-scale=1.0">
<tittle> Edit Siswa </titlle>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h2>Edit Data Siswa</h2>
<form method="POST">
 <div class="mb-3">
 <label class="form-label">NIS</label>
 <input type="text" name="nis" class="form-control" value="<?php echo $siswa['nis']; ?>" <required>
 </div>
 <div class="mb-3">
  <label class="from-label">Nama Siswa</label>
  <input type"text name="nama_siswa" class="form_control" value+"<?php echo $siswa['nama_siswa']; ?>" <required>
</div>
<div class="mb-3">
        
        <label class="form_label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="L" <?php if($siswa['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
            <option value="P" <?php if($siswa['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
        </select>
        </div>
        <div class="mb-3">
        <label class="form-label"> Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $siswa['tempat_lahir']; ?>" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']; ?>" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Kelas:</label>
        <select name="id_kelas" class"form-control" required>
            <?php 
            while($id_kelas = mysqli_fetch_assoc($kelas_result)): ?>
                <option value="<?php echo $id_kelas['id_kelas']; ?>" 
                    <?php if($id_kelas['id_kelas'] == $siswa['id_kelas']) echo 'selected'; ?>>
                    <?php echo $id_kelas['nama_kelas']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        </div>
        <div class="mb-3">
        <label class="form-label">Wali Murid</label>
        <select name="id_wali" class="form-control" required>
        <?php
            while($wali = mysqli_fetch_assoc($wali_result)): ?>
                <option value="<?php echo $wali['id_wali']; ?>" 
                    <?php if($wali_murid['id_wali'] == $siswa['id_wali']) echo 'selected'; ?>>
                    <?php echo $id_wali['nama_wali']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>