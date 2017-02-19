  <?php if ($title != 'ACP'): ?>
        <footer class="footer">
          <div class="container-fluid">
            <p class="copyright pull-right">&copy; 2017 <a href="<?php echo base_url() ?>">adnuacp.com</a>, made with love from ADNU-SSG</p>
          </div>
        </footer>
      </div>
    </div>
  <?php endif ?>

  </body>

  <!-- Delete Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal" aria-labelledby="deleteLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Are you sure you want to delete this student?</h4>
          <p class="subtitle">Note: All payment records made by this student will also be deleted.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" form="delete_form">Delete</button>
        </div>
      </div><!-- /.modal-content -->
      <?php echo form_open(base_url('index.php/officer/student/delete'), 'class="hidden" id="delete_form"') ?>
        <input type="hidden" name="id">
      <?php echo form_close(); ?>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script src="<?php echo base_url('assets/js/jquery-3.1.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-table.js'); ?>"></script>
  <script type="text/javascript">
    $(window).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

      var $table = $('#student_table');
      $table.bootstrapTable({
        toolbar: ".toolbar",
  
        search: true,
        showToggle: true,
        showColumns: true,
        pagination: true,
        striped: true,
        pageSize: 8,
        pageList: [8,10,25,50,100],
        
        formatShowingRows: function(pageFrom, pageTo, totalRows){
          //do nothing here, we don't want to show the text "showing x of y from..." 
        },
        formatRecordsPerPage: function(pageNumber){
          return pageNumber + " rows visible";
        },
        icons: {
          refresh: 'fa fa-refresh',
          toggle: 'fa fa-th-list',
          columns: 'fa fa-columns',
          detailOpen: 'fa fa-plus-circle',
          detailClose: 'fa fa-minus-circle'
        }
      });

      $(window).resize(function () {
        $table.bootstrapTable('resetView');
      });

      $('input[name="id"]').change(function() {
        $(this).next('.error').fadeOut();
      });
      
      $('select[name="college"]').change(function() {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('index.php/course/department_option') ?>",
          data: {college: $(this).val()},
          dataType: 'html',
          success: function(result) {
            $('select[name="department"]').html(result);
          },
          error:function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
          }
        });
      });

      $('select[name="department"]').change(function() {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('index.php/course/course_option') ?>",
          data: {department: $(this).val()},
          dataType: 'html',
          success: function(result) {
            $('select[name="course"]').html(result);
          },
          error:function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
          }
        });
      });

      $('select[name="course"]').change(function() {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('index.php/course/major_option') ?>",
          data: {course: $(this).val(), department: $('select[name="department"]').val()},
          dataType: 'html',
          success: function(result) {
            $('select[name="major"]').html(result);
          },
          error:function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
          }
        });
      });

      $('[data-toggle="popover"]').popover();

      <?php $tmp = $this->session->userdata('error'); ?>
      <?php if (!empty($tmp)): ?>
        $.notify({
          icon: "pe-7s-attention",
          message: "<strong>Error!</strong> <?php echo $this->session->userdata('error'); ?>"
        },{
          type: 'danger',
          timer: 4000,
          placement: {
            from: 'top',
            align: 'right'
          }
        });
        <?php $this->session->unset_userdata('error'); ?>
      <?php endif ?>
      <?php $tmp = $this->session->userdata('message'); ?>
      <?php if (!empty($tmp)): ?>
        $.notify({
          icon: "pe-7s-check",
          message: "<strong>Success!</strong> <?php echo $this->session->userdata('message'); ?>"
        },{
          type: 'info',
          timer: 4000,
          placement: {
            from: 'top',
            align: 'right'
          }
        });
        <?php $this->session->unset_userdata('message'); ?>
      <?php endif ?>
    });

    var $delete_modal = $('#delete_modal');
    var $modal_title = $("#delete_modal").find('.modal-title');
    var $subtitle = $("#delete_modal").find('.subtitle');

    function operateFormatter(value, row, index) {
      return [
        '<a class="table-action edit" href="javascript:void(0)" target="_blank" data-toggle="tooltip" title="Edit" data-placement="top">',
          '<i class="fa fa-edit"></i>',
        '</a>',
        '<a class="table-action remove" href="javascript:void(0)" title="Remove" data-toggle="tooltip" data-placement="top">',
          '<i class="fa fa-remove"></i>',
        '</a>'
      ].join('');
    }

    window.operateStudents = {
      'click .edit': function (e, value, row, index) {
        window.location.href="<?php echo base_url("index.php/officer/edit/"); ?>"+row._data.id+"";
      },
      'click .remove': function (e, value, row, index) {
        $delete_modal.modal("show");
        $modal_title.text("Are you sure you want to delete this student?");
        $subtitle.addClass('hidden');

        $delete_form.attr('action', "<?php echo base_url('index.php/student/delete'); ?>");
        $delete_form.find('input').val(row._data.id);
      }
    };
  </script>
</html>