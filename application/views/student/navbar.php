<div class="wrapper">
  <div class="sidebar" data-color="blue" data-image="<?php echo base_url('assets/img/sidebar.jpeg'); ?>">
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text"><?php echo $this->session->userdata('fname').' '.$this->session->userdata('lname'); ?></a>
      </div>

      <ul class="nav">
        <li class="active"><a href="<?php echo base_url('index.php/student'); ?>"><i class="pe-7s-home"></i><p>Home</p></a></li>
        <li><a href="<?php echo base_url('index.php/student/download'); ?>"><i class="pe-7s-ticket"></i><p>Download Ticket</p></a></li>
        <li><a href="<?php echo base_url('index.php/student/profile'); ?>"><i class="pe-7s-id"></i><p>User Profile</p></a></li>
        <li><a href="<?php echo base_url('index.php/logout'); ?>"><i class="pe-7s-power"></i><p>Log out</p></a></li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $tab; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <?php if (isset($type[1])): ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Student <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <?php foreach ($type as $row): ?>
                    <li><a href="<?php echo base_url(strtolower('index.php/student/switch/'.$row['type'])); ?>">Use as <?php echo $row["type"] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </li>
            </ul>
          <?php endif ?>
        </div>
      </div>
    </nav>