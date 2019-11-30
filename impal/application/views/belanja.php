<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/header') ?>
<style>
    
</style>
</head>
<body>
    <?php $this->load->view('layout/navbar') ?>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0;foreach ($data as $key) {?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?=base_url()?>assets/img/<?=$key->gambar?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Obat</a></h4>
                                <h5 class="media-heading"> <a href="#"><?=$key->nama_obat?></a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?=$key->quantity?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rp.<?=$key->harga?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rp.<?=$key->totalharga?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="<?=base_url();?>pages/belanja/"><button type="button" class="btn btn-danger"> 
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></a></td>
                    </tr>
                <?php $total=$total+$key->totalharga?>
                <?php } ?>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>Rp.<?php echo $total?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span><a href="<?=base_url();?>pages/index"> Continue Shopping
                        </a></button></td>
                        <td> <a href="<?=base_url()?>pages/checkout/">
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>