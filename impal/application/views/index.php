<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('layout/header') ?>
    <style>
    body{
      background: rgb(238,174,202);
      background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(76,147,226,1) 100%);
      margin: auto;
    }
    .carousel, .slide,
.carousel .carousel-inner,
.carousel .carousel-item,
.carousel .carousel-item img,
.carousel .carousel-control {
  border-radius: solid;
  overflow: hidden;
}
    .carousel-inner img {
    width: 50%;
    height: 50%;
    
    }
    .body{
      margin-top: 30px;
      margin-bottom: 30px;
    }
    .rekobat, .rekobat .daftar {
      padding-top: 20px;
      padding-left : 30px;
    }
    .rekobat img{
      height: 90px;
      width: 70%;
    }
    .pagina{
      padding-top : 40px;
      padding-left :100px;
    }
    .btn{
      margin-top:20px;
      
    </style>
</head>
<body>
    <?php $this->load->view('layout/navbar') ?>
      <div class="rekobat text-center">
      <?php if($this->session->flashdata('checkout')){ ?>
      Pembelian berhasil
      <?php }?>
        <h3>Daftar Obat</h3>
        <div class="row daftar">
        <?php  foreach ($data as $key) {?>
          
          <div class="col-lg-3">
              <div class="card" style="width: 18rem;">
                <img src="<?=base_url()?>assets/img/<?=$key->gambar?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title"><?=$key->nama_obat?></h3>
                  <p class="card-text"><?=$key->harga?></p>
                  <form action="<?=base_url();?>pages/addchart/<?=$key->id;?>" method="post">
                    <h5>Jumlah</h5>
                    <input type="number" name="qty" class="form-control" placeholder="5">
                    <input type="text" name="harga" class="form-control" value="<?=$key->harga;?>" style="display:none">
                    <button type="submit" class="btn btn-primary">Beli</button>
                  </form>
                </div>
              </div>

            </div>
        <?php  } ?>
          
        
          <!-- <div class="col">
            <img src="<?=base_url();?>assets/img/logo2.png" alt="Logo">
          </div>
          <div class="col">
            <img src="<?=base_url();?>assets/img/logo2.png" alt="Logo">
          </div>
          <div class="col">
            <img src="<?=base_url();?>assets/img/logo2.png" alt="Logo">
          </div> -->
        </div>
        <div>
        <div class ="row pagina">
        <?php echo $pagination; ?>
        </div>
      </div>
    </div><!-- /.container -->

</body>
</html>