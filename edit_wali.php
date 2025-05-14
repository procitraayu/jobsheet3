<?php
    include 'koneksi.php';

    if(isset($_GET['id'])) {
        $id_wali = $_GET['id'];
        $query = "SELECT * FROM wali_murid WHERE id_wali = $id_wali";
        $result = mysqli_query($koneksi, $query);
        $wali = mysqli_fetch_assoc($result);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama_wali =  $_POST['nama_wali'];

        $query_update = "UPDATE wali_murid SET nama_wali='$nama_wali' WHERE id_wali = $id_wali";

        if(mysqli_query($koneksi, $query_update)){
            header("Location: walimurid.php");
            exit();
        }else{
            echo "Error..." . mysqli_error($koneksi);
        }    
    }
    ?>

    <html>
    <head>
        <title>Edit wali</title>
    </head>
        <body>
            <h2>Edit wali</h2>
            <form method="POST">
                <label>Nama wali</label>
                <input type="text" name="nama_wali" value="<?php echo $row['nama_wali'];?>" required></br>
                <label>Kontak</label>
                <input type="text" name="kontak" value="<?php echo $row['kontak'];?>" required></br>


                <button type="submit">Update</button>
                <a href="index.php">Batal</a>
        </body>
    </html>