<?php
include 'koneksi.php';

$query = "SELECT * FROM id_kelas $search_query";
$result = mysqli_query($koneksi, $query);
?>

<html>
    <head>
        <title>Data Kelas</title>
</head>
<body>
    <a href="tambah_siswa.php">Tambah Kelas</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                    <th>Aksi</th>
</tr>
</thead>
<tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_kelas'] ?></td>
            <td><?php echo $row['nama_kelas'] ?></td>
            <td>
                <a href="edit_kelas.php?id=<?php echo $row['id_kelas'] ?>">Edit</a>
                <a href="#">Hapus</a>
    </td>
    </tr>
    <?php endwhile; ?>
    <tbody>
    </table>
        </body>
            </html>
