<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Edit Student</h4>
            <p class="category">Please complete the form below.</p>
          </div>
          <div class="content">
            <?php echo form_open(); ?>
              <input type="hidden" name="id" value="<?php echo $student_id; ?>">
              <div class="row">
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>First Name <small>(required)</small></label>
                    <input type="text" name="fname" value="<?php echo set_value('fname', ucwords($student['first_name'])); ?>" class="form-control" placeholder="ex. Juan" required>
                    <?php echo form_error('fname'); ?>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>Last Name <small>(required)</small></label>
                    <input type="text" name="lname" value="<?php echo set_value('lname', ucwords($student['last_name'])); ?>" placeholder="ex. Dela Cruz" class="form-control">
                    <?php echo form_error('lname'); ?>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>Email <small>(required)</small></label>
                    <input type="email" name="email" value="<?php echo set_value('email', $student['email']); ?>" placeholder="ex. Dela Cruz" class="form-control">
                    <?php echo form_error('email'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>Contact Number <small>(required)</small></label>
                    <input type="text" name="contact_number" value="<?php echo set_value('contact_number', $student['contact_number']); ?>" placeholder="ex. Dela Cruz" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <?php echo form_error('password'); ?>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                    <?php echo form_error('confirm_password'); ?>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info btn-fill pull-right">Update Student</button>
              <div class="clearfix"></div>
            <?php echo form_close(); ?>
          </div>          
          <div class="header">
            <h4 class="title">Registered Topic</h4>
            <p class="category">Here is topic the student registered for.</p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-sm-12">
                <h4 style="margin: 0">Creative x Tourism | 8:00 - 12:00 NN</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>