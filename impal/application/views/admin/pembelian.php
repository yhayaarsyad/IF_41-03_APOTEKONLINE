<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap core CSS -->
  <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url() ?>assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Daftar Obat</title>
<style>
    .judul{
          width: 500px;
          height: 50px;
          font-size: 18px;
          font-weight: bold;
          border: 1px solid #000;
          border-radius: 40px;
          background: #1e1e1e;
          padding: 10px;
          color: #fff;
          margin: 0 auto;
          margin-bottom : 20px;
        }
</style>
</head>

<body>

<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"><a href="<?=base_url();?>pages/admin/admin">Admin</a></div>
  <div class="list-group list-group-flush">
    <a href="<?=base_url();?>pages/index" class="list-group-item list-group-item-action bg-light">Index</a>
    <a href="<?=base_url();?>pages/pembelian" class="list-group-item list-group-item-action bg-light">Daftar Pembelian</a>
    <a href="<?=base_url();?>pages/daftarobat" class="list-group-item list-group-item-action bg-light">Daftar Obat</a>
    <a href="<?=base_url();?>pages/logout" class="list-group-item list-group-item-action bg-light">Logout</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper" style="padding: 50px;">
<div class="judul text-center">List Pembeli</div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kode Obat</th>
                        <th>Quantity</th>
                        <th>Total harga</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $no = 0;foreach($pembayaran as $key) {?>                 
                    <tr>
                     <td><?=$no++?></td>
                        <td><?=$key->namauser?></td>
                        <td><?=$key->alamat?></td>
                        <td><?=$key->kodeobat?></td>
                        <td><?=$key->quantity?></td>
                         <td><?=$key->totalharga?></td>
                         <td><a href="<?=base_url()?>pages/hapuspembelian/<?=$key->id?>">
                         <button class="btn btn-primary">hapus</button></a></td>
                    </tr>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Kirim</button>
                    </tr>
                   <?php } ?>
                </tbody>
            </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengiriman Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Barang Sudah Di Kirim
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

// $("#menu-toggle").click(function(e) {
//   e.preventDefault();
//   $("#wrapper").toggleClass("toggled");
// });
</script>

</body>
</html>