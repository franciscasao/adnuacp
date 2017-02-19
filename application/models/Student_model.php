<?php
  class Student_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function create() {
      $data = array(
        'id' => $this->input->post('id'),
        'email' => $this->input->post('email'),
        'contact_number' => $this->input->post('contact_number'),
        'year' => $this->input->post('year'),
        'course_id' => $this->input->post('major'),
        'updated' => TRUE
      );

      if($this->db->insert('student', $data)) {
        $tmp = array(
          'id' => uniqid(),
          'person_id' => $this->input->post('id'),
          'type' => 'Student'
        ); 
        if($this->db->insert('person_type', $tmp))
          return TRUE;
      } else
        return FALSE;
      // return $this->db->set($data)->get_compiled_insert('student');
    }

    public function retrieve_joined_event($id = NULL) {
      $this->db->select('id, schedule_id');
      $this->db->from('record');
      if(is_null($id))
        $this->db->where('student_id', $this->session->userdata('id'));
      else
        $this->db->where('student_id', $this->session->userdata('id'));

      $query = $this->db->get();
      $record = $query->row();

      if(count($record) == 0)
        return NULL;

      $this->db->select('name, start_time, end_time, venue');
      $this->db->from('event');
      $this->db->join('schedule', 'event.id = schedule.event_id');
      $this->db->where('schedule.id', $record->schedule_id);

      $query = $this->db->get();
      $event = $query->row();

      $data = array(
        'code' => $record->id,
        'event_name' => $event->name,
        'start_time' => $event->start_time,
        'end_time' => $event->end_time,
        'venue' => $event->venue
      );

      return $data;
    }

    public function retrieve_student($id = NULL) {
      $this->db->select('person.id, first_name, last_name, email, course_name, contact_number, year');
      $this->db->from('person');
      $this->db->join('student', 'person.id = student.id');
      $this->db->join('course', 'course.id = student.course_id');

      if(isset($id))
        $this->db->where('person.id', $id);

      $query = $this->db->get();

      if(isset($id))
        return $query->row_array();
      else
        return $query->result_array();
    }

    public function update($id, $data) {
      $this->db->where('id', $id);
      return $this->db->update('student', $data);
    }
  }
?>