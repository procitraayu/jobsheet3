<?php
include 'koneksi.php';

$sql = "SELECT siswa. *, id_kelas.nama_kelas, wali_murid.nama_wali FROM siswa
    LEFT JOIN id_kelas ON siswa.id_kelas = id_kelas.id_kelas
    LEFT JOIN wali_murid ON siswa.id_wali = wali_murid.id_wali";
$result = mysqli_query($koneksi, $sql);

?>

<html>
    <head>
<title> Data Siswa </title>
</head>
<body>
    <a href="kelas.php">Kelolah Kelas</a>
    <a href="walimurid.php">Kelolah Wali Murid</a>
    <a href="tambah_siswa.php">Tambah Siswa</a>
    <table border="1">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Wali Murid</th>
                <th>Aksi</th>
</tr>
</thead>
<tbody>
    <?php while($data = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $data['nis'] ?></td>
    <td><?php echo $data['nama_siswa'] ?></td>
    <td><?php echo $data['jenis_kelamin'] ?></td>
    <td><?php echo $data['tempat_lahir'] ?></td>
    <td><?php echo $data['tanggal_lahir'] ?></td>
    <td><?php echo $data['nama_kelas'] ?></td>
    <td><?php echo $data['nama_wali'] ?></td>
    <td>
        <a href="edit_siswa.php">Edit</a>
        <a href="hapus_siswa.php">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</body>
</html>

