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

    public function exists($id) {
      $this->db->where('id', $id);
      $this->db->from('person');
      if($this->db->count_all_results() > 0)
        return TRUE;
      else
        return FALSE;
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
      return $this->db->update('person', $data);
      // return $this->db->set($data)->get_compiled_update('person');
    }

    public function send_mail($id, $email, $code) {
      $tmp['id'] = $id;
      $tmp['codex'] = $code;

      $config['mailtype'] = 'html';
      $this->load->library('email', $config);
      $this->email->from('adnussg@adnuacp.com', 'ADNU Supreme Student Government');
      $this->email->to($email);
      $this->email->subject('adnuacp.com | Password Reset');
      $this->email->message($this->load->view('email/reset', $tmp, TRUE));
      if($this->email->send()) {
        $data = array('pass_code' => $tmp['codex']);
        $this->db->where('id', $id);
        if($this->db->update('person', $data))
          return TRUE;
      } else
        return FALSE;
    }

    public function get_id($email) {
      $this->db->select('id');
      $this->db->from('student');
      $this->db->where('email', $email);

      $query = $this->db->get();
      $result = $query->row();

      return $result->id;
    }

    public function get_code($id) {
      $this->db->select('pass_code');
      $this->db->from('person');
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      return $result->pass_code;
    }

    public function update_password($id) {
      $pass = $this->input->post('password');
      $this->update($id, array('password' => password_hash($pass, PASSWORD_DEFAULT), 'pass_code' => NULL));
    }

    public function create() {
      $data = array(
        'id' => $this->input->post('id'),
        'last_name' => ucwords($this->input->post('lname')),
        'first_name' => ucwords($this->input->post('fname')),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'code' => uniqid(),
        'pass_code' => NULL
      );

      if($this->db->insert('person', $data))
        return TRUE;
      else
        return FALSE;
    }

    public function send_verification() {
      $tmp['code'] = uniqid();
      $tmp['id'] = $this->input->post('id');
      // $tmp['id'] = 201310524;

      $config['mailtype'] = 'html';
      $this->load->library('email', $config);

      $this->email->from('adnussg@adnuacp.com', 'ADNU Supreme Student Government');
      $this->email->to($this->input->post('email'));
      // $this->email->to('fcasao@gbox.adnu.edu.ph');
      $this->email->subject('adnuacp.com | Email Verification');
      $this->email->message($this->load->view('email/verification', $tmp, TRUE));

      if($this->email->send()) {
        $data = array('code' => $tmp['code']);
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('person', $data))
          return TRUE;
      } else
        return FALSE;
    }

    public function verify($id, $code) {
      $this->db->select('code');
      $this->db->from('person');
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      if($result->code == $code){
        $this->db->set('code', 'Verified');
        $this->db->where('id', $id);
        if($this->db->update('person')){
          $user = $this->get_type($id);
          $this->session->set_userdata(array(
            'message' => 'You have successfully verified your account.', 
            'id' => $id,
            'fname' => $this->get_first_name($id),
            'lname' => $this->get_last_name($id),
            'type' => strtolower($user[0]["type"])
          ));
          redirect(base_url('index.php/'.strtolower($user[0]["type"])), 'location');
        }
      } else {
        $this->session->set_userdata(array('error' => 'Invalid credentials.'));
        redirect(base_url());
      }

    }
  }
?>