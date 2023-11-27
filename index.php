<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Josefin+Sans:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
    <title>Project</title>
    <style> 
       *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        text-transform: capitalize;
       }

        .header {
            width: 100%;
            height: 200px;
            background-color: #21D4FD;
            background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
            color: white;
            text-align: center;
            padding-top:50px;
        }

        nav {
            width: 100%;
            height: 50px; 
            background-color:#333;
            color:white;
            display: flex;
            align-items: flex-end;
            padding-left:5px;
        }

        nav ul {
            display: flex;
            flex-direction: none;
            list-style: none;
        }
        nav ul li {
        margin-right:20px;
        margin-top: 10px;
        color: #f2f2f2;
        display: block;
        color: #f2f2f2;
        text-align: center;
        }
        nav ul li a {
          color: white;
          text-decoration: none;
          margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>My Website</h1>
        <p>selamat datang di smk sangkuriang 1</p>
    </div>
    <nav>
        <h3>LOGO</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">login</a></li>
                <li><a href="#">about</a></li>
            </ul>
       </nav>

    <?php

//memanggil file koneksi.php
require "koneksi.php";

// query Read atau View data pemain
$query = mysqli_query($con, "SELECT * FROM pemain");
$jumlahPemain = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Data Pemain</title>
    
</head>
<body>
    <a href="form_pemain.php" class="btn btn-primary mt-2 ms-2"><i class="fa-solid fa-user-plus"></i></a>
        <h3 class="mt-3">Data Pemain Arsenal F.C.</h3>
<table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>No</th>
<th>Nama Pemain</th>
<th>Negara Asal</th>
<th>Posisi</th>
<th>No Punggung</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
//pengecekan data jika data kosong
if($jumlahPemain==0){
?>
<tr>
<td colspan=6 class="text-center">Data Kosong</td>
</tr>
<?php
}
else{
//membuat urutan atau no dengan menggunakan increment
$jumlah = 1;
//menampilkan data pemain dalam bentuk tabel menggunakan perulangan(while)
while($data=mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $jumlah; ?></td>
<td><?php echo $data['nama']; ?></td>
<td><?php echo $data['negara_asal']; ?></td>
<td><?php echo $data['posisi']; ?></td>
<td><?php echo $data['no_punggung']; ?></td> 
<td>
<a href="update_pemain.php?id_pemain=<?php echo $data['id_pemain']; ?>" class="ml-3 btn btn-primary"> <i class="fa-solid fa-user-pen"></i></a>
<a href="hapus_pemain.php?id_pemain=<?=$data['id_pemain']?>" class="ml-3 btn btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fa-solid fa-trash"></i></a>
</td>
</tr>
<?php
//increment untuk mengurutkan no dari 1 sampai terbesar
$jumlah++;
}
}
?>
</tbody>
</table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>

