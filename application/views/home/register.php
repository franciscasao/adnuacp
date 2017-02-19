<div class="mid-content long">
  <div class="middle">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8" style="background-color: white; border-radius: 10px; padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; margin-top: 20px;">
      <div class="row">
        <div class="col-sm-12 text-center">
          <img src="<?php echo base_url('assets/img/SSG.png'); ?>">
          <h3 style="margin-top: 10px;">Student Registration</h3>
          <h5>Complete the fields below to create an account.</h5>
        </div>
      </div>
      <?php echo form_open(); ?>
      <div class="row">
        <div class="col-sm-6 col-md-4 form-group">
          <label>ID Number <small>(required)</small></label>
          <input type="text" name="id" value="<?php echo set_value('id'); ?>" class="form-control" placeholder="ex. 201311234" required>
          <?php echo form_error('id'); ?>
        </div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>First Name <small>(required)</small></label>
          <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" class="form-control" placeholder="ex. David" required>
          <?php echo form_error('fname'); ?>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Last Name <small>(required)</small></label>
          <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" class="form-control" placeholder="ex. Salon" required>
          <?php echo form_error('lname'); ?>
        </div>
        <div class="clearfix visible-md visible-lg"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>College <small>(required)</small></label>
          <select class="form-control" name="college" required>
            <option value="" selected disabled>Select a college</option>
            <?php foreach ($colleges as $college_item): ?>
              <option value="<?php echo $college_item['college_name']; ?>" <?php echo set_select('college', $college_item['college_name']); ?>>
                <?php echo $college_item['college_name'] ?>
              </option>
            <?php endforeach ?>
          </select>
          <?php echo form_error('college'); ?>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Department <small>(required)</small></label>
          <select class="form-control" name="department" required>
            <option value="" selected disabled>Select a college</option>
            <?php $tmp = $this->input->post('department'); ?>
            <?php if(!empty($tmp)): ?>
              <?php foreach ($departments as $department_item): ?>
                <option value="<?php echo $department_item['department_name'] ?>" <?php echo set_select('department', $department_item['department_name']) ?>>
                  <?php echo $department_item['department_name'] ?>
                </option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
          <?php echo form_error('department'); ?>
        </div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Course <small>(required)</small></label>
          <select class="form-control" name="course" required>
            <option value="" selected disabled>Select a department</option>
            <?php $tmp = $this->input->post('course'); ?>
            <?php if(!empty($mp)): ?>
              <?php foreach ($courses as $course_item): ?>
                <option value="<?php echo $course_item['course_name'] ?>" <?php echo set_select('course', $course_item['course_name']) ?>>
                  <?php echo $course_item['course_name'] ?>
                </option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
          <?php echo form_error('course'); ?>
        </div>
        <div class="clearfix visible-md visible-lg"></div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Major <small>(required)</small></label>
          <select class="form-control" name="major" required>
            <option value="" selected disabled>Select a course</option>            
            <?php $tmp = $this->input->post('major'); ?>
            <?php if(!empty($tmp)): ?>
              <?php foreach ($majors as $major_item): ?>
                <?php if (empty($major_item['major_name'])): ?>
                  <option value="<?php echo $major_item['id'] ?>" <?php echo set_select('major', $major_item['id']) ?>>None</option>
                <?php endif ?>
                <?php if (!empty($major_item['major_name'])): ?>
                  <option value="<?php echo $major_item['id'] ?>" <?php echo set_select('major', $major_item['id']) ?>>
                    <?php echo $major_item['major_name'] ?>
                  </option>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          </select>
          <?php echo form_error('major'); ?>
        </div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Year <small>(required)</small></label>
          <select class="form-control" name="year" required>
            <option value="1" <?php echo set_select('year', 1) ?>>1st Year</option>
            <option value="2" <?php echo set_select('year', 2) ?>>2nd Year</option>
            <option value="3" <?php echo set_select('year', 3) ?>>3rd Year</option>
            <option value="4" <?php echo set_select('year', 4) ?>>4th Year</option>
            <option value="5" <?php echo set_select('year', 5) ?>>5th Year</option>
          </select>
          <?php echo form_error('year'); ?>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Email <small>(required)</small></label>
          <input type="email" name="email" placeholder="ex. someone@gmail.com" value="<?php echo set_value('email') ?>" class="form-control" required>
          <?php echo form_error('email'); ?>
        </div>
        <div class="clearfix visible-md visible-lg"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Contact Number <small>(required)</small></label>
          <input type="text" name="contact_number" placeholder="ex. 09123456789" value="<?php echo set_value('contact_number') ?>" class="form-control" required>
          <?php echo form_error('contact_number'); ?>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Password <small>(required)</small></label>
          <input type="password" name="password" placeholder="Password" class="form-control" required>
          <?php echo form_error('password'); ?>
        </div>
        <div class="col-sm-6 col-md-4 form-group">
          <label>Confirm Passowrd <small>(required)</small></label>
          <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
          <?php echo form_error('confirm_password'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <button type="button" onclick="window.location.href='<?php echo base_url(); ?>'" class="btn btn-transparent">Sign In</button>
        </div>
        <div class="col-sm-6 text-right">
          <button type="submit" class="btn">Register</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>   
</div>