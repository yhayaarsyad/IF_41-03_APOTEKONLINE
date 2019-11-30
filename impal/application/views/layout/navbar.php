


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?=base_url();?>pages/index">Apotek Online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>pages/belanja"><i class="fas fa-shopping-cart" ></i></a>
      </li>
    </ul>
    <span class="navbar-text">
    <?php if (!$this->session->userdata('id')) { ?>
      <a href="<?=base_url();?>pages/login">Login</a> | <a href="<?=base_url();?>pages/register">Register</a>
    <?php }else{ ?>
      <?php if($this->session->userdata('role') == 'admin'){ ?>
      <a href="<?=base_url();?>/pages/admin">Dashboard</a> | 
      <?php } ?>
      <a href="<?=base_url();?>pages/profil"><?=$this->session->userdata('username');?></a> | <a href="<?=base_url();?>pages/logout">Logout</a>
    <?php } ?>
    </span>
  </div>
</nav>