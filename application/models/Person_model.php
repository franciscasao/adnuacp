<?php
  class Person_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get_first_name($id) {
      $this->db->select('first_name');
      $this->db->from('person');
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      return $result->first_name;
    }

    public function get_last_name($id) {
      $this->db->select('last_name');
      $this->db->from('person');
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      return $result->last_name;
    }

    public function get_type($id) {
      $this->db->select('type');
      $this->db->from('person_type');
      $this->db->where('person_id', $id);

      $query = $this->db->get();

      return $query->result_array();
    }

    public function check_credentials() {
      $id = $this->input->post('id');
      $password_input = $this->input->post('password');

      $this->db->select('password');
      $this->db->from('person');
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      if(substr($result->password, 0, 1) == '$'){
        if(password_verify($password_input, $result->password))
          return TRUE;
        else
          return FALSE;
      } else {
        if(md5($password_input) == $result->password) {
          $this->update($id, array('password' => password_hash($password_input, PASSWORD_DEFAULT)));
          return TRUE;
        } else 
          return FALSE;
      }
    }

    public function email_exists() {
      $this->db->from('student');
      $this->db->where('email', $this->input->post('email'));
      if($this->db->count_all_results() > 0)
        return TRUE;
      else
        return FALSE;
    }

    public function update($id, $data) {
      $this->db->where('id', $id);
      $this->db->update('person', $data);
    }
  }
?>