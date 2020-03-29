<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--<title>Hello, world!</title>-->
    <title><?= $title ?></title>
    
  
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
  <a class="navbar-brand" href="#"><font color = "white" size=25 family="roboto">Perpustakaan Suka Cita</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse navbar-right" id="navbarNavAltMarkup">
    <div class="nav navbar-nav">
      <a class="nav-item nav-link active" href="<?= base_url(); ?>home"> <font color = "white">Home </font><span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>buku"><font color = "white">Buku</font></a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>peminjam"><font color = "white">Anggota</font></a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>peminjaman"><font color = "white">Data Peminjaman</font></a>
      <a class="nav-item nav-link" href="#"><font color = "white">About</font></a>
    </div>
  </div>
</nav>