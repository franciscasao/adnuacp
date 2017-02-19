<!DOCTYPE html>
<html style="height: 100%; font-family: 'Open Sans', Helvetica, arial, sans-serif;">
  <head><meta name="viewport" content="width=device-width, initial-scale=1.0" /></head>
  <body style="margin: 0; height: 100%;">
    <div class="mid-content" style="display: table; height: 100%; min-height: 600px; position: absolute; width: 100%; background-image: url('<?php echo base_url('assets/img/test2.png'); ?>'); background-size: cover; background-position: center;">
      <div class="middle text-center" style="display: table-cell; vertical-align: middle; background: radial-gradient(rgba(130, 130, 130, 0.36), rgba(41, 63, 80, 0.69));">
        <div style="max-width: 350px; margin: 0 auto; background: white; border-radius: 10px; text-align: center;">
          <img src="<?php echo base_url('assets/img/SSG.png'); ?>" style="width: 40%; ">
          <div class="subtitle" style="color: #3f4652; font-weight: 700; margin-top: 10px; margin-bottom: 10px; font-size: 14px;">Click the link below to reset your password.</div>
          <a href="<?php echo base_url('index.php/reset/'.$id.'/'.$codex); ?>" class="btn" style="color: rgba(0, 132, 255, 0.7); font-size: 24px; background-color: transparent; border-color: transparent; cursor: pointer; font-weight: 400; padding: 6px 12px; text-decoration: none;">Reset Password</a>
          <div style="padding: 8px;"></div>
        </div>
      </div>   
    </div>
  </body>
</html>