<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">New Topic</h4>
            <p class="category">Please complete the form below.</p>
          </div>
          <div class="content">
            <?php echo form_open('officer/new'); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group icons">
                    <label>Icon (required)</label>
                    <div class="icons text-center">
                      <label><input type="radio" name="icon" value="anchor"><img src="<?php echo base_url('assets/img/icons/anchor.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="aperture"><img src="<?php echo base_url('assets/img/icons/aperture.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="arrow-up"><img src="<?php echo base_url('assets/img/icons/arrow-up.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="arrow-down"><img src="<?php echo base_url('assets/img/icons/arrow-down.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="art"><img src="<?php echo base_url('assets/img/icons/art.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="barchart"><img src="<?php echo base_url('assets/img/icons/barchart.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="batteryfull"><img src="<?php echo base_url('assets/img/icons/batteryfull.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="batterylow"><img src="<?php echo base_url('assets/img/icons/batterylow.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="bike"><img src="<?php echo base_url('assets/img/icons/bike.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="biker"><img src="<?php echo base_url('assets/img/icons/biker.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="blimp"><img src="<?php echo base_url('assets/img/icons/blimp.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="bolt"><img src="<?php echo base_url('assets/img/icons/bolt.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="bomb"><img src="<?php echo base_url('assets/img/icons/bomb.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="booklet"><img src="<?php echo base_url('assets/img/icons/booklet.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="bookshelf"><img src="<?php echo base_url('assets/img/icons/bookshelf.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="briefcase"><img src="<?php echo base_url('assets/img/icons/briefcase.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="brightness"><img src="<?php echo base_url('assets/img/icons/brightness.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="browser"><img src="<?php echo base_url('assets/img/icons/browser.png'); ?>"></label>
                      <label><input type="radio" name="icon" value="brush-pencil"><img src="<?php echo base_url('assets/img/icons/brush-pencil.png'); ?>"></label>
                    </div>                      
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Topic Name (required)</label>
                    <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="ex. Rev Up: Towards" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Topic Limit (optional)</label>
                    <input type="number" name="limit" value="<?php echo set_value('limit'); ?>" placeholder="ex. 100" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Description (required)</label>
                    <input type="text" name="">
                    <textarea class="form-control" name="description" placeholder="This topic aims to..."><?php echo set_value('description') ?></textarea>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <div class="header">
            <h4 class="title">Topic Schedule</h4>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>Start Time (required)</label>
                  <input type="time" name="start_time[]" value="<?php echo set_value('start_time[]'); ?>" class="form-control" required>
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>End Time (required)</label>
                  <input type="time" name="end_time[]" value="<?php echo set_value('end_time[]'); ?>" class="form-control" required>
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>Venue (required)</label>
                  <input type="text" name="venue[]" value="<?php echo set_value('venue[]'); ?>" class="form-control" placeholder="Arruper Convention Hall" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>Start Time (optional)</label>
                  <input type="time" name="start_time[]" value="<?php echo set_value('start_time[]'); ?>" class="form-control">
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>End Time (optional)</label>
                  <input type="time" name="end_time[]" value="<?php echo set_value('end_time[]'); ?>" class="form-control">
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label>Venue (optional)</label>
                  <input type="text" name="venue[]" value="<?php echo set_value('venue[]'); ?>" class="form-control" placeholder="Arrupe Convention Hall">
                </div>
              </div>
            </div>
          </div>
          <div class="header">
            <h4 class="title">
              Topic Restrictions
              <button class="btn btn-info btn-fill" style="display: inline; padding: 3px 7px;"><i class="fa fa-plus"></i> Add</button>
            </h4>
            <p class="category">This topic is only available for:</p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-sm-5 col-md-5">
                <label>Year Level (optional)</label>
                <select name="year[]" class="form-control">
                  <option value="All">All Year Levels</option>
                  <option value="1">1st Year</option>
                </select>
              </div>
              <div class="col-sm-5 col-md-5">
                <label>Year Level (optional)</label>
                <select name="year[]" class="form-control">
                  <option value="All">All Year Levels</option>
                  <option value="1">1st Year</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Add Topic</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>