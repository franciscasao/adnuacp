<body>
  <div class="content">
    <div class="middle text-center">
      <?php echo form_open('reset'); ?>
        <img src="<?php echo base_url('assets/img/SSG.png') ?>">
        <div class="subtitle">We can reset your password if you let us know your email address:</div>
        <input type="email" name="email" class="form-control" placeholder="Email">
        <button type="submit" class="btn">Reset Password</button><br>
        <a href="<?php echo base_url(); ?>">Sign In</a><br>
        <a href="<?php echo base_url(); ?>">Need an account?</a>
      <?php echo form_close(); ?>
    </div>   
  </div>
</body>