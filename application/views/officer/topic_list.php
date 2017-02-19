<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php $c = 1; ?>
      <?php if (count($topics) > 0): ?>
      <?php $offset = TRUE; ?>
      <?php foreach ($topics as $topic_item): ?>
        <?php 
          if ($offset)
            $class = "col-sm-offset-1 col-sm-5 col-md-offset-0 col-md-4";
          else
            $class = "col-sm-5 col-md-4";
        ?>
        <div class="<?php echo $class; ?>">
          <div class="card card-user">
            <div class="image">
              <img src="<?php echo base_url('assets/img/header.jpg') ?>" alt="...">
            </div>
            <div class="content">
              <div class="author">
               <a href="<?php echo base_url('index.php/officer/topic/'.$topic_item['id']); ?>">
                <img class="avatar border-gray" src="<?php echo base_url('assets/img/icons/'.$topic_item["icon"].'.png') ?>" alt="...">
                  <h4 class="title">
                    <?php echo ucwords($topic_item["name"]); ?><br>
                    <small><?php echo ucwords($topic_item["schedule"][0]["venue"]); ?></small>
                  </h4>
                </a>
              </div>
              <?php 
                if (count($topic_item["schedule"]) > 1) 
                  $class = "col-sm-6 text-center";
                else
                  $class = "col-sm-12 text-center";
              ?>
              <?php foreach ($topic_item["schedule"] as $schedule): ?>
                <div class="<?php echo $class; ?>">
                  <p class="description"><?php echo $schedule["start_time"]." - ".$schedule["end_time"]; ?></p>
                  <div class="label <?php echo $schedule["slots"] > 0 ? 'label-info' : 'label-danger' ?>" style="display: block; width: 6em; margin: 0 auto;">
                    <?php echo $schedule["slots"] < 1 ? 'Closed' : $schedule["slots"].' Slots'; ?>
                  </div>                 
                </div>
              <?php endforeach ?>
            </div>
            <hr>
            <div class="text-center">
              <button class="btn btn-simple" onclick="window.location.href='<?php echo $topic_item['id'] ?>'"><i class="fa fa-plus"></i> Details</button>
            </div>
          </div>
        </div>
        <?php if ($c % 3 == 0): ?>
          <div class="clearfix visible-md visible-lg"></div>  
        <?php endif ?>
        <?php if ($c % 2 == 0): ?>
          <div class="clearfix visible-sm"></div>  
        <?php endif ?>
        <?php $offset = !$offset; ?>
        <?php $c++; ?>
      <?php endforeach ?>
      <?php endif ?>
      <?php if (count($topics) == 0): ?>
        <h3>No Topics</h3>
        <h5>There are no topics yet, check back later.</h5>
      <?php endif ?>
    </div>
  </div>
</div>