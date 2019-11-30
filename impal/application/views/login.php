<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/header') ?>
    
<style>

.cntr{
    margin: auto;
    width: 40%;
}
body{
      background: rgb(238,174,202);
      background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(76,147,226,1) 100%);   
    }
}
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
</style>
</head>

<body>
    <?php $this->load->view('layout/navbar') ?>
  
  <!--login-->
  <div class = "container cntr">
  <div class="col form-login">
  <div class="outter-form-login">
  
            <form action="<?=base_url()?>pages/log" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Member</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                
                <div class="text-center forget">
                    <p>Forgot Password ?</p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>