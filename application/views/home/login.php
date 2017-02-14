<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-filter">
    <?php echo form_open(); ?>        
      <center>
        <!-- <img src="<?php echo base_url('assets/img/ADNU.png') ?>" width="100%"> -->
        <img src="<?php echo base_url('assets/img/SSG.png') ?>" width="100%">
      </center>
      <h2>Alternative Class Program</h2>
      <div class="subtitle">Sign in to get started.</div>
      <?php $tmp = $this->session->userdata('error'); ?>
      <?php if (!empty($tmp)): ?>
        <div class="alert alert-danger fade in message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>
        </div>
        <?php $this->session->unset_userdata('error'); ?>
      <?php endif ?>
      <input type="text" name="id" class="form-control" placeholder="ID Number (ex. 201311234)" value="<?php echo set_value('id'); ?>" required>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <button type="submit" class="btn">Sign In</button>
      <br>
      <a href="<?php echo base_url('index.php/reset'); ?>">Forgot Password?</a>
      <br>
      <a role="button" data-toggle="modal" data-target=".modal">Need an account?</a>
    <?php echo form_close(); ?>
  </div>
  <div class="carousel-inner" role="listbox">
    <!-- <div class="item"><div class="fill" style="background-image: url('<?php echo base_url('assets/img/test1.png') ?>"></div></div> -->
    <div class="item active"><div class="fill" style="background-image: url('<?php echo base_url('assets/img/test2.png') ?>"></div></div>
    <!-- <div class="item"><div class="fill" style="background-image: url('<?php echo base_url('assets/img/test3.png') ?>"></div></div> -->
  </div>
</div><!-- /.carousel -->