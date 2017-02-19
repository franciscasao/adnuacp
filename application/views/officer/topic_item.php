<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="card card-user">
          <div class="header">
            <h4 class="title"><?php echo $topic['details']['name'] ?></h4>
            <p class="category"><?php echo $topic['details']['description'] ?></p>
            <div class="label label-info"><?php echo $topic['details']['event_limit'].' Slot Limit'; ?></div>
          </div>
          <div class="header">
            <h5 class="title">Schedules</h5>
          </div>
          <div class="content">
            <?php foreach ($topic['schedule'] as $topic_item): ?>
              <?php echo $topic_item['start_time'].' - '.$topic_item['end_time'].' | '.$topic_item['venue']; ?><br>
            <?php endforeach ?>
          </div>          
          <div class="header">
            <h5 class="title">Participants</h5>
          </div>
          <div class="content">
            <table class="table" id="student_table">
              <thead>
                <th data-field="id" data-sortable="true">ID Number</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="course" data-sortable="true">Course</th>
                <th data-field="contact_number" data-sortable="true">Contact Number</th>
                <th data-field="email" data-sortable="true">Email</th>
                <th data-field="actions" data-formatter="operateFormatter" data-events="operateStudents">Actions</th>
              </thead>
              <tbody>
                <?php foreach($topic['participants'] as $student_item): ?>
                  <tr data-id="<?php echo $student_item["id"]; ?>">
                    <td><?php echo $student_item["id"]; ?></td>
                    <td><?php echo ucwords($student_item["first_name"].' '.$student_item['last_name']); ?></td>
                    <td><?php echo $student_item["year"].' | '.$student_item["course_name"]; ?></td>
                    <td><?php echo $student_item["contact_number"]; ?></td>
                    <td><?php echo $student_item["email"]; ?></td>
                    <td></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>