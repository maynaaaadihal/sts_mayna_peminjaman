<?php 
require_once('database.php');
$data=tampildata('peminjaman');
$nomor=0;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Peminjaman & Pengembalian</title>
  </head>
  <body>
  <?php 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:login.php?msg=belum_login");
    }
    ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a class="navbar-brand" href="home.php">Home</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="user.php">User</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="barang.php">Barang</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="peminjaman.php">Peminjaman & Pengembalian</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="detail_barang.php">Detail Barang </a>
      </li>
    </ul>
     <form class="d-flex">
            <a class="btn btn-outline-success" type="submit" href="logout.php">Logout</a>
          </form>
  </div>
</nav>

<div class="container mt-3">
    <center><h1>Peminjaman dan Pengembalian</h1></center>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID</th>
      <th scope="col">Tgl. Peminjaman</th>
      <th scope="col">Tgl. Kembali</th>
      <th scope="col">No. Identitas</th>
      <th scope="col">Nama</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $item) : ?>
    <?php $nomor++; ?>
    <tr>
      <th scope="row"><?php echo "$nomor"; ?></th>
      <td><?php echo $item['id']; ?></td>
      <td><?php echo $item['tgl_peminjaman']; ?></td>
      <td><?php echo $item['tgl_kembali']; ?></td>
      <td><?php echo $item['no_identitas']; ?></td>
      <td><?php echo $item['nama']; ?></td>
      <td><?php echo $item['kode_barang']; ?></td>
      <td><?php echo $item['nama_barang']; ?></td>
      <td><?php echo $item['jumlah']; ?></td>
      <td><?php echo "<a href='javascript:hapusData(".$item['id'].")'>Delete</a>"; ?></td>

    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
<script language="JavaScript" type="text/JavaScript">
    function hapusData(id){
      if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'delete.php?tablename=peminjaman&id=' + id;
      }
    }
  </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>