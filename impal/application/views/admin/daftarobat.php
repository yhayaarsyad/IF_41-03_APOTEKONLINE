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
<div class="judul text-center">List Obat</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama obat</th>
                        <th>kode obat</th>
                        <th>harga</th>
                        <th>stok date</th>
                        <th>opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 0;foreach($obat as $key) {?>
                    <tr>
                      <td><?=$no++?></td>
                        <td><?=$key->nama_obat?></td>
                        <td><?=$key->kode_obat?></td>
                        <td><?=$key->harga?></td>
                        <td><?=$key->stock?></td>
                        <td><a href="<?=base_url()?>pages/hapusobat/<?=$key->id?>">
                        <button class="btn btn-primary">hapus</button></a>
                        <button type="button" class="btn btn-primary" onclick="update('<?=$key->id?>','<?=$key->harga?>','<?=$key->stock?>','<?=$key->nama_obat?>')">Update</button>                                                                                               
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url()?>pages/updateobat/" method="post">
      <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="id" id="idobat">
                </div>
        <div class="form-group">
                    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" id="nama_obat" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="harga" placeholder="Harga" id="harga">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="stock" placeholder="stock obat" id="stock">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="submit"></button>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!-- <script>
$(document).ready(function() {
  $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    $('#example').DataTable();
} );

// $("#menu-toggle").click(function(e) {
//   e.preventDefault();
//   $("#wrapper").toggleClass("toggled");
// });
</script>
<script>
  function update(id){
    console.log(id);
    $('#idobat').val(id);
  }
</script> -->
<script>
  $(document).ready(function(){
     $('#example').DataTable();
     
  });
  function update(id,harga,stok,nama){
       $('#idobat').val(id);
       $('#nama_obat').val(nama);
       $('#kode_obat').val(id);
       $('#harga').val(harga);
       $('#stock').val(stok);
       $("#myModal").modal();
     
     
     }
</script>
</body>
</html>