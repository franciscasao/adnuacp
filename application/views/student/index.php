<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php if (count($topic) > 0): ?>
      <?php $offset = TRUE; ?>
      <?php foreach ($topic as $topic_item): ?>
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
               <a href="#">
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
                  <div class="label <?php echo $schedule["slots"] > 1 ? 'label-info' : 'label-danger' ?>" style="display: block; width: 6em; margin: 0 auto;">
                    <?php echo $schedule["slots"] < 1 ? 'Closed' : $schedule["slots"].' Slots'; ?>
                  </div>
                  <button onclick="window.location.href='<?php echo base_url('index.php/student/join/'.$schedule['id']) ?>'" class="btn btn-info btn-fill btn-sm" <?php if($schedule["slots"] < 1){echo 'disabled';} ?>>Register</button>
                </div>
              <?php endforeach ?>
            </div>
            <hr>
            <div class="text-center">
              <button data-container="body" data-toggle="popover" data-placement="left" class="btn btn-simple" data-content="<?php echo $topic_item["description"] ?>" data-trigger="focus | hover"><i class="fa fa-plus"></i> Details</button>
            </div>
          </div>
        </div>
        <?php $offset = !$offset; ?>
      <?php endforeach ?>
      <?php endif ?>
      <?php if (count($topic) == 0): ?>
        <h3>No Topics</h3>
        <h5>There are no topics yet, check back later.</h5>
      <?php endif ?>
    </div>
  </div>
</div>