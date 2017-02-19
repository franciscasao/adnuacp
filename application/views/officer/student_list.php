<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Student List</h4>
            <p class="subtitle">Here's the list of students updated real time.</p>
          </div>
          <div class="fresh-table">
            <div class="toolbar">
            </div>      
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
                <?php foreach($students as $student_item): ?>
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