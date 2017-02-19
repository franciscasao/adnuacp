<?php
  class Course_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get_college() {
      $this->db->distinct();
      $this->db->select('college_name');
      $this->db->from('course');

      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_department($college) {
      $this->db->distinct();
      $this->db->select('department_name');
      $this->db->from('course');
      if(!empty($college))
        $this->db->where('college_name', $college);

      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_course($department) {
      $this->db->distinct();
      $this->db->select('course_name');
      $this->db->from('course');
      if(!empty($department))
        $this->db->where('department_name', $department);

      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_major($department, $course) {
      $this->db->select('id, major_name');
      $this->db->from('course');
      if(!empty($course) && !empty($department))
        $this->db->where(array('department_name' => $department, 'course_name' => $course));

      $query = $this->db->get();
      return $query->result_array();
    }
  }
?>