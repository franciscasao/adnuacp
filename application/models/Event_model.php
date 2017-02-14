<?php
  class Event_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get_all() {
      $this->db->select('*');
      $this->db->from('event');

      $query = $this->db->get();
      $result = $query->result_array();

      $count = 0;
      foreach($query->result_array() as $event_item){
        $result[$count]["schedule"] = $this->get_schedule($event_item["id"]);
        $c = 0;
        foreach ($result[$count]["schedule"] as $item) {
          $result[$count]["schedule"][$c]["slots"] = $this->get_slots($item["id"]);
          $c++;
        }
        $count++;
      }

      return $result;
    }

    public function get_schedule($id) {
      $this->db->select('*');
      $this->db->from('schedule');
      $this->db->where('event_id', $id);

      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_slots($sched_id) {
      $this->db->select('event.event_limit');
      $this->db->from('event');
      $this->db->join('schedule', 'event.id = schedule.event_id');
      $this->db->where('schedule.id', $sched_id);

      $query = $this->db->get();
      $row = $query->row();
      $limit = $row->event_limit;

      $this->db->from('record');
      $this->db->where('schedule_id', $sched_id);
      $current = $this->db->count_all_results();

      return $limit-$current;
    }

    public function create_record($id) {
      $data = array(
        'id' => uniqid(),
        'student_id' => $this->session->userdata('id'),
        'schedule_id' => $id
      );

      // return $this->db->set($data)->get_compiled_insert('record');
      return $this->db->insert('record', $data);
    }

    public function check_eligibility($student_id) {
      $this->db->from('record');
      $this->db->where('student_id', $student_id);
      return $this->db->count_all_results();
    }
  }
?>