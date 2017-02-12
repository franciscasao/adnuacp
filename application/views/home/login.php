<body>
  <!-- <nav class="navbar navbar-default navbar-fixed-top" id="top-nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img height="100%">
          <div>ADNU ACP</div>
        </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php"><i class="fa fa-sign-in"></i> Sign In</a></li>
          <li><a href="registration.php"><i class="fa fa-edit"></i> Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav> -->

  <!-- Carousel
  ================================================== -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-filter">
      <?php echo form_open(); ?>        
        <center>
          <!-- <img src="<?php echo base_url('assets/img/ADNU.png') ?>" width="100%"> -->
          <img src="<?php echo base_url('assets/img/SSG.png') ?>" width="100%">
        </center>
        <h2>Alternative Class Program</h2>
        <div class="subtitle">Sign in to get started.</div>
        <?php if (!empty($this->session->userdata('error'))): ?>
          <div class="alert alert-danger fade in message">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>
          </div>
          <!-- <?php $this->session->unset_userdata('error'); ?> -->
        <?php endif ?>
        <input type="text" name="id" class="form-control" placeholder="ID Number (ex. 201311234)" value="<?php echo set_value('id'); ?>" required>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
        <button type="submit" class="btn">Sign In</button>
        <br>
        <a href="<?php echo base_url('reset'); ?>">Forgot Password?</a>
        <br>
        <a role="button" data-toggle="modal" data-target=".modal">Need an account?</a>
      <?php echo form_close(); ?>
    </div>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="fill" style="background-image: url('<?php echo base_url('assets/img/test1.png') ?>"></div>
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>Example headline.</h1>
            <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div> -->
      </div>
      <div class="item">
        <div class="fill" style="background-image: url('<?php echo base_url('assets/img/test2.png') ?>"></div>
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div> -->
      </div>
      <div class="item">
        <div class="fill" style="background-image: url('<?php echo base_url('assets/img/test3.png') ?>"></div>
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div> -->
      </div>
    </div>
  </div><!-- /.carousel -->
</body>