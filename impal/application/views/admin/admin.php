<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>assets/css/simple-sidebar.css" rel="stylesheet">
<style>
        .form-login{

        }
        .outter-form-login {
            margin-top: 40px;
            padding: 60px;
            background: #EEEEEE;
            margin-bottom: 20% center ;
            border-radius: 5px;
        }
        .logo-login {
            position: absolute;
            font-size: 35px;
            background: #21A957;
            color: #FFFFFF;
            padding: 10px 18px;
            top: -40px;
            border-radius: 50%;
            left: 40%;
        }
        .inner-login .form-control {
            background: #D3D3D3;
        }
        h3.title-login {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .forget {
            margin-top: 20px;
            color: #ADADAD;
        }
        .btn-custom-green {
            background: #21A957;
            color: #fff;
        }
        .tombol{
            padding-top : 20px;        }
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
    <div id="page-content-wrapper">

      <div class="container-fluid">
      <div class = "container cntr">
  <div class="col form-login">
  <div class="outter-form-login">
  
            <<?php echo form_open_multipart('pages/aksi_upload');?>
            <h3 class="text-center title-login">Submit Obat</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="kode_obat" placeholder="Kode Obat">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="harga" placeholder="Harga">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="stock" placeholder="stock obat">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" name="berkas">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <div class="tombol">
                    <input type="submit" class="btn btn-block btn-custom-green" value="Submit" />
                </div>
                
            </form>
        </div>
    </div>
</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
