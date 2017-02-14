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

  <div id="details" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body details">
          <div class="row">
            <div class="col-sm-3 text-center icon">
              <img src="<?php echo base_url('assets/img/icons/filmreel.png') ?>">
            </div>
            <div class="col-sm-9">
              <h4 class="title"></h4>
              <h6 class="subtitle"></h6>
              <h5 class="desc"></h5>

              <!-- <h6>Materials to bring</h6>
              <h5>Pets and other thins</h5> -->
              <!-- <h6>Schedules</h6>
              <div class="col-sm-6 text-center">
                <p class="sched" style="margin: 0;">8 AM - 12 NN</p>
                <div class="label label-info" style="display: block; width: 6em; margin: 0 auto;">20 Slots</div>
                <button class="btn btn-info btn-fill btn-sm">Register</button>
              </div>
              <div class="col-sm-6 text-center">
                <p class="sched" style="margin: 0;">8 AM - 12 NN</p>
                <div class="label label-danger" style="display: block; width: 6em; margin: 0 auto;">Closed</div>
                <button class="btn btn-info btn-fill btn-sm">Register</button>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  <script src="<?php echo base_url('assets/js/jquery-3.1.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js') ?>"></script>
  <script type="text/javascript">
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
  </script>
</html>