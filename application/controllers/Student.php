<?php
  class Student extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('person_model');
      $this->load->model('event_model');
      $this->load->model('student_model');

      $this->load->helper(array('form', 'url'));
      $this->load->library(array('session', 'form_validation'));
      $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    
      $tmp = $this->session->userdata('type');
      if(empty($tmp)){
        $this->session->set_userdata(array('error' => "The page you're trying to access needs you to login first."));
        redirect(base_url(), 'location');
      } else if($this->session->userdata('type') != 'student') {
        $this->session->set_userdata(array('error' => "You don't have permission to access that page."));
        redirect(base_url($this->session->userdata('type')), 'location');
      }
    }

    public function index() {
      $data["title"] = 'Student | Topic List';
      $data["tab"] = 'Topic List';
      $data["type"] = $this->person_model->get_type($this->session->userdata('id'));
      $data["topic"] = $this->event_model->get_all();
      // print_r($data["topic"]);
      $this->load->view('template/header', $data);
      $this->load->view('student/navbar', $data);
      $this->load->view('student/index', $data);
      $this->load->view('template/footer');
    }

    public function switch_type($type) {
      $this->session->set_userdata(array('type' => $type));
      redirect(base_url('index.php/'.$type), 'location');
    }

    public function join($id) {
      if($this->event_model->check_eligibility($this->session->userdata('id')) < 1){
        $slots = $this->event_model->get_slots($id);
        if($slots > 0) {
          if($this->event_model->create_record($id))
            $this->session->set_userdata(array('message' => "You have successfully registered to the topic you chose. You may now download your ticket."));
          else
            $this->session->set_userdata(array('error' => "There was an error in registering to the event. Kindly refer this to the administrator."));
        } else
          $this->session->set_userdata(array('error' => "The topic you chose is already full."));
      } else
        $this->session->set_userdata(array('error' => "Only one topic registration for a semester is allowed."));

      redirect(base_url('index.php/'.$this->session->userdata('type')), 'location');
    }

    public function download_ticket() {
      $detail = $this->student_model->retrieve_joined_event();
      if(empty($detail)) {
        $this->session->set_userdata(array('error' => "You haven't registered in a topic yet. Kindly register first then download your ticket."));
        redirect(base_url('index.php/'.$this->session->userdata('type')), 'location');
      } else {
        $im     = imagecreatefrompng(base_url('assets/img/blank_ticket.png'));
        $yellow = imagecolorallocate($im, 255, 198, 0);
        $white = imagecolorallocate($im, 207, 219, 221);
        $black = imagecolorallocate($im, 0, 0, 0);

        $font = realpath('assets/fonts/Montserrat/Montserrat-Regular.otf');

        $data = array(
          $this->session->userdata('fname').' '.$this->session->userdata('lname'), 
          $this->session->userdata('id'),
          '------',
          $detail['event_name'],
          $detail['start_time'].' - '.$detail['end_time'],
          $detail['venue'],
          '------',
          $detail['code']
        );
        $x = 42;
        foreach ($data as $key => $value) {
          if(strlen($value) > 24) {
            $string = "";
            $string2 = "";
            $value = explode(" ", $value);
            foreach ($value as $n) {
              if (strlen($string) + strlen($n) > 23)
                $string2 .= $n . " ";
              else
                $string .= $n . " ";
            }

            imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($string));
            $x+=20;
            imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($string2));
          } else 
            imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($value));

          $x+=20;
        }

        $x = 55;
        foreach ($data as $key => $value) {
          if(strlen($value) > 24) {
            $string = "";
            $string2 = "";
            $value = explode(" ", $value);
            foreach ($value as $n) {
              if (strlen($string) + strlen($n) > 23)
                $string2 .= $n . " ";
              else
                $string .= $n . " ";
            }

            imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($string));
            $x+=20;
            imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($string2));
          } else 
            imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($value));

          $x+=20;
        }

        header('Content-Disposition: Attachment;filename=Ticket | '.$this->session->userdata('id').'.png'); 
        header("Content-type: image/png");

        imagepng($im);
        imagedestroy($im);
      }
    }
  }
?>