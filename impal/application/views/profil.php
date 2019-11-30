<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/header') ?>
<style>
    body{  
      background: rgb(238,174,202);
      background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(76,147,226,1) 100%);
      
    }
 
        .image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
</style>
    
</head>
<body>
    <?php $this->load->view('layout/navbar') ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="<?=base_url();?>assets/img/logo.png" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                     <h3> Profile </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Lengkapi Profil</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        
                                   

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$profile['nama'];?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$profile['email'];?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Alamat</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$profile['alamat'];?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">No hp</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$profile['nohp'];?>
                                            </div>
                                        </div>
                                        <hr />
                

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <form action="<?=base_url()?>pages/updateprofil" method="post">
                                            <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="@gmail" name="nama" value="<?php echo $profile['email']?>">
                                            </div>
                                            <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" placeholder="yaya nurhidayat" name="nama" value="<?php echo $profile['nama']?>">
                                            </div>
                                            <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?php echo $profile['alamat']?></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label>Nomer HP</label>
                                            <input type="text" class="form-control" placeholder="0822**" name="nohp" value="<?php echo $profile['nohp']?>">
                                            </div>
                                            
                                            <input type="submit" class="btn btn-primary" value="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>