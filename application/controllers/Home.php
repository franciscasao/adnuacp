<?php
  class Home extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('person_model');

      $this->load->helper(array('form', 'url'));
      $this->load->library(array('session', 'form_validation'));
      $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    }

    public function index() {
      $data['title'] = 'ACP';

      $this->form_validation->set_rules('id', 'id number', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');

      if($this->form_validation->run() === TRUE) {
        if($this->person_model->exists($this->input->post('id'))) {
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
        } else {
          $this->session->set_userdata(array('error' => "Invalid ID Number or Password"));
        }
      }

      $this->load->view('template/header', $data);
      $this->load->view('home/login', $data);
      $this->load->view('template/footer', $data);
    }

    public function reset() {
      $data['title'] = 'Reset Password';

      $this->form_validation->set_rules('email', 'email', 'required');

      if($this->form_validation->run() === TRUE) {
        if($this->person_model->email_exists($this->input->post('email'))) {
          $id = $this->person_model->get_id($this->input->post('email'));
          $tmp = uniqid();
          // echo $tmp.' '.$this->person_model->send_mail($id, $this->input->post('email'), $tmp);
          if($this->person_model->send_mail($id, $this->input->post('email'), $tmp)) {

            $this->session->set_userdata(array('message' => 'An email has been sent to you on how to reset your password. Kindly wait for a while for it to be sent.'));
            redirect(base_url('index.php/reset'), 'location');
          }
        } else
          $this->session->set_userdata(array('error' => 'Email does not exist.'));
      }

      $this->load->view('template/header', $data);
      $this->load->view('home/reset');
      $this->load->view('template/footer', $data);
    }

    public function change_pass($id, $code) {
      $data['title'] = 'Change Password';

      if($this->person_model->get_code($id) == $code) {
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('new_password', 'confirm password', 'required|matches[password]');

        if($this->form_validation->run() === TRUE) {
          $this->person_model->update_password($id);
          $this->session->set_userdata(array('message' => 'Password has been updated. You may now login.'));
          redirect(base_url(), 'location');
        }

        $this->load->view('template/header', $data);
        $this->load->view('home/change_pass');
        $this->load->view('template/footer', $data);
      } else {
        $this->session->set_userdata(array('error' => 'Invalid data.'));
        redirect(base_url('index.php/reset'), 'location');
      }
    }

    public function register() {
      $this->load->model('course_model');
      $this->load->model('student_model');
      $data['title'] = "Registration";
      $data['colleges'] = $this->course_model->get_college();

      $tmp = $this->input->post('major');
      if(!empty($tmp)) {
        $data['departments'] = $this->course_model->get_department($this->input->post('college'));
        $data['courses'] = $this->course_model->get_course($this->input->post('department'));
        $data['majors'] = $this->course_model->get_major($this->input->post('department'), $this->input->post('course'));
      }

      $this->form_validation->set_rules('id', 'id number', 'required|is_unique[person.id]|min_length[9]|max_length[9]', 
        array('required' => 'Please enter your %s',
              'is_unique' => 'The id number is already taken. Please contact an officer if you haven\'t registered before yet.')
      );
      $this->form_validation->set_rules('fname', 'first name', 'required|max_length[128]');
      $this->form_validation->set_rules('lname', 'last name', 'required|max_length[128]');
      $this->form_validation->set_rules('college', 'college', 'required');
      $this->form_validation->set_rules('department', 'department', 'required');
      $this->form_validation->set_rules('course', 'course', 'required');
      $this->form_validation->set_rules('major', 'major', 'required');
      $this->form_validation->set_rules('year', 'year', 'required');
      $this->form_validation->set_rules('email', 'email', 'required|is_unique[student.email]');
      $this->form_validation->set_rules('contact_number', 'contact_number', 'required|min_length[11]|max_length[11]');
      $this->form_validation->set_rules('password', 'password', 'required');
      $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

      if($this->form_validation->run() === TRUE) {       
        if($this->person_model->create()) {
          if($this->student_model->create()) {
            if($this->person_model->send_verification())
              redirect(base_url('index.php/success'), 'location');
          }
        }
      }

      $this->load->view('template/header', $data);
      $this->load->view('home/register', $data);
      $this->load->view('template/footer');
    }

    public function success_register() {
      $data['title'] = 'Verify Email';

      $this->load->view('template/header', $data);
      $this->load->view('student/success.php', $data);
      $this->load->view('template/footer');
    }

    public function logout() {
      $this->session->sess_destroy();
      redirect(base_url());
    }

    public function verify($id, $code) {
      $this->person_model->verify($id, $code);
    }
  }
?>