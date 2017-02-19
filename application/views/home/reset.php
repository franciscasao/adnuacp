<div class="mid-content">
  <div class="middle text-center">
    <?php echo form_open('reset'); ?>
      <img src="<?php echo base_url('assets/img/SSG.png') ?>">
      <div class="subtitle">We can reset your password if you let us know your email address:</div>
      <?php $tmp = $this->session->userdata('error'); ?>
      <?php if (!empty($tmp)): ?>
        <div class="alert alert-danger fade in message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>
        </div>
        <?php $this->session->unset_userdata('error'); ?>
      <?php endif ?>
      <?php $tmp = $this->session->userdata('message'); ?>
      <?php if (!empty($tmp)): ?>
        <div class="alert alert-info fade in message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> <?php echo $this->session->userdata('message'); ?>
        </div>
        <?php $this->session->unset_userdata('message'); ?>
      <?php endif ?>
      <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
      <button type="submit" class="btn">Reset Password</button><br>
      <a href="<?php echo base_url(); ?>">Sign In</a><br>
      <a href="<?php echo base_url(); ?>">Need an account?</a>
    <?php echo form_close(); ?>
  </div>   
</div>