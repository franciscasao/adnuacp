<?php
  class Home extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('person_model');

      $this->load->helper(array('form', 'url'));
      $this->load->library(array('session', 'form_validation', 'email'));
      $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    }

    public function index() {
      $data['title'] = 'ACP';

      $this->form_validation->set_rules('id', 'id number', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');

      if($this->form_validation->run() === TRUE) {
        if($this->person_model->check_credentials()) {
          $id = $this->input->post('id');
          $user = $this->person_model->get_type($id);
          $this->session->set_userdata(array(
            'id' => $id, 
            'fname' => $this->person_model->get_first_name($id),
            'lname' => $this->person_model->get_last_name($id),
            'type' => strtolower($user[0]["type"])
          ));

          redirect('/'.strtolower($user[0]["type"]), 'location');
        } else
          $this->session->set_userdata(array('error' => "Invalid ID Number or Password"));
      }

      $this->load->view('template/header', $data);
      $this->load->view('home/login', $data);
      $this->load->view('template/footer', $data);
    }

    public function reset() {
      $data['title'] = 'Reset Password';

      if($this->person_model->email_exists())
        $this->session->set_userdata(array('error' => 'Email does exist.'));
      else
        $this->session->set_userdata(array('error' => 'Email does not exist.'));

      $this->load->view('template/header', $data);
      $this->load->view('home/reset');
      $this->load->view('template/footer', $data);
    }

    public function logout() {
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }
?>