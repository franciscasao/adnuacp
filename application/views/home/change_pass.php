<div class="mid-content">
  <div class="middle text-center">
    <?php echo form_open(); ?>
      <img src="<?php echo base_url('assets/img/SSG.png') ?>">
      <div class="subtitle">Complete the fields below to change your password.</div>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <?php echo form_error('password'); ?>
      <input type="password" name="new_password" class="form-control" placeholder="Confirm Password" required>
      <?php echo form_error('new_password'); ?>
      <button type="submit" class="btn">Reset Password</button><br>
    <?php echo form_close(); ?>
  </div>   
</div>