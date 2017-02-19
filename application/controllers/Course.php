<?php
  class Course extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('course_model');

      $this->load->helper(array('form', 'url'));
      $this->load->library(array('session', 'form_validation'));
      $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    }

    public function department_option() {
      $html = "<option value=\"\" selected disabled>Select a department</option>";
      $data = $this->course_model->get_department($this->input->post('college'));
      foreach ($data as $row)
        $html = $html . "<option value=\"".$row['department_name']."\">".$row['department_name']."</option>";

      echo $html;
    }

    public function course_option() {
      $html = "<option value=\"\" selected disabled>Select a course</option>";
      $data = $this->course_model->get_course($this->input->post('department'));
      foreach ($data as $row)
        $html = $html . "<option value=\"".$row['course_name']."\">".$row['course_name']."</option>";

      echo $html;
    }

    public function major_option() {
      $html = "<option value=\"\" selected disabled>Select a major</option>";

      $data = $this->course_model->get_major($this->input->post('department'), $this->input->post('course'));
      if(count($data) == 1) {
        $tmp = $data[0]['major_name'];
        if(empty($tmp))
          $html = "<option value=\"".$data[0]['id']."\" selected>None</option";
        else
          $html = "<option value=\"".$data[0]['id']."\" selected>".$data[0]['major_name']."</option";
      } else {
        foreach ($data as $row)
          $html = $html . "<option value=\"".$row['id']."\">".$row['major_name']."</option>";
      }

      echo $html;
    }

  }
?>