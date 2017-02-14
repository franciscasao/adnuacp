<?php
  class Officer extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('person_model');

      $this->load->helper(array('form', 'url'));
      $this->load->library(array('session', 'form_validation'));
      $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

      $tmp = $this->session->userdata('type');
      if(empty($tmp)){
        $this->session->set_userdata(array('error' => "The page you're trying to access needs you to login first."));
        redirect(base_url(), 'location');
      } else if($this->session->userdata('type') != 'officer') {
        $this->session->set_userdata(array('error' => "You don't have permission to access that page."));
        redirect(base_url($this->session->userdata('type')), 'location');
      }
    }

    public function index() {
      $data['title'] = "Officer | Create Topic";
      $data['type'] = $this->person_model->get_type($this->session->userdata('id'));

      $this->load->view('template/header', $data);
      $this->load->view('officer/navbar', $data);
      $this->load->view('officer/new');
      $this->load->view('template/footer');
    }

    public function switch_type($type) {
      $this->session->set_userdata(array('type' => $type));
      redirect(base_url('index.php/'.$type), 'location');
    }
  }
?>