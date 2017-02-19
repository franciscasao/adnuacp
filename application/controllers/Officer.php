<?php
  class Officer extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('person_model');
      $this->load->model('student_model');

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
      $data['tab'] = 'New Topic';
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

    public function list_student() {
      $data['title'] = 'Officer | Student List';
      $data['tab'] = 'Student List';
      $data['students'] = $this->student_model->retrieve_student();
      $data['type'] = $this->person_model->get_type($this->session->userdata('id'));

      $this->load->view('template/header', $data);
      $this->load->view('officer/navbar', $data);
      $this->load->view('officer/student_list', $data);
      $this->load->view('template/footer');
    }

    public function edit_student($id) {
      $data['title'] = 'Officer | Edit Student';
      $data['tab'] = 'Student List';
      $data['student_id'] = $id;
      $data['student'] = $this->student_model->retrieve_student($id);
      $data['type'] = $this->person_model->get_type($this->session->userdata('id'));
      $data['topic'] = $this->student_model->retrieve_joined_event($id);

      $this->form_validation->set_rules('fname', 'first name', 'required|max_length[128]');
      $this->form_validation->set_rules('lname', 'last name', 'required|max_length[128]');
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('contact_number', 'contact number', 'required|min_length[11]|max_length[12]');

      if(!empty($_POST['password'])){
        $this->form_validation->set_rules('password', 'new password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');
      }

      if($this->form_validation->run() === TRUE) {
        $tmp = array(
          'first_name' => $this->input->post('fname'),
          'last_name' => $this->input->post('lname')
        );
        if(!empty($_POST['password']))
          $tmp['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if($this->person_model->update($this->input->post('id'), $tmp)) {
          $tmp = array(
            'email' => $this->input->post('email'),
            'contact_number' => $this->input->post('contact_number')
          );

          if($this->student_model->update($this->input->post('id'), $tmp))
            $this->session->set_userdata('message', 'Student successfully updated!');
        } else
          $this->session->set_userdata('error', 'Cannot update student. Kindly refer this to an administrator.');
      }
      
      $this->load->view('template/header', $data);
      $this->load->view('officer/navbar', $data);
      $this->load->view('officer/edit_student', $data);
      $this->load->view('template/footer');
    }

    public function list_topic() {
      $this->load->model('event_model');

      $data["title"] = 'Officer | Topic List';
      $data['tab'] = 'Topic List';
      $data["topics"] = $this->event_model->get_all();

      $this->load->view('template/header', $data);
      $this->load->view('officer/navbar', $data);
      $this->load->view('officer/topic_list', $data);
      $this->load->view('template/footer');
    }

    public function topic_item($id) {
      $this->load->model('event_model');

      $data['title'] = 'Officer | Topic';
      $data['tab'] = 'Topic List';
      $data['topic'] = $this->event_model->retrieve_event($id);

      $this->load->view('template/header', $data);
      $this->load->view('officer/navbar', $data);
      $this->load->view('officer/topic_item', $data);
      $this->load->view('template/footer');
    }
  }
?>