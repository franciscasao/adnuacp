<?php
  // echo "INSERT INTO person_type VALUES";  
  // $c = 0;
  // while ($row = mysqli_fetch_assoc($result)) {
  //   if(!empty($row['ContactNumber'])) {
  //     if($row['ContactNumber'] > 630000000000) {
  //       $num = $row["ContactNumber"] - 630000000000;
  //       echo "UPDATE student SET contact_number = \"0".$num."\" WHERE id = ".$row['StudentID'].";";
  //       echo "<br>";
  //       $c++;
  //     }
  //   }
  //   echo "('".uniqid()."', ".$row['id'].", 'Student'),";
  //   echo "<br>";
  // }

  // $test = array("first" => "1st value", "second" => "2nd value");
  // echo "UPDATE student SET ";
  // while($value = current($test)) {
  //   echo key($test)." = ".$value;
  //   echo ", ";
  //   next($test);
  // }

  // for ($i=1; $i < 21; $i++) { 
  //   echo '(\''.uniqid().'\', \'8:00 AM\', \'12:00 NN\', \'\', \'\'),';
  //   echo "<br>";
  // }

  
  // $link = mysqli_connect('148.72.232.169:3306', 'adnussg', 'hX?ye615', 'acp');
  // $result = mysqli_query($link, "SELECT * FROM event JOIN schedule ON schedule.event_id = event.id");

  // while($row = mysqli_fetch_assoc($result)) {
  //   echo 'Event ID: '.$row['event_id'];
  //   echo '<br>';
  //   echo 'Name: '.$row['name'];
  //   echo '<br>';
  //   echo 'Schedule ID: '.$row['id'];
  //   echo '<br>';
  //   echo 'Time: '.$row['start_time'].' - '.$row['end_time'];
  //   echo '<br>';
  //   echo 'Venue: '.$row['venue'];
  //   echo '<br>';
  //   echo '<br>';
  //   echo '<br>';
  // }

  // Check if student is registered
  // Check if student has already registered to any topic

  // $handle = fopen("assets/participants.txt", "r");
  // if ($handle) {
  //   while (($line = fgets($handle)) !== false) {
  //     $result = mysqli_query($link, "SELECT * FROM person WHERE id = '".$line."'");
  //     if(mysqli_num_rows($result) > 0) {
  //       $result = mysqli_query($link, "SELECT * FROM record WHERE student_id = '".$line."'");
  //       if(mysqli_num_rows($result) == 0) {
  //         mysqli_query($link, "INSERT INTO record VALUES ('".uniqid()."', ".$line.", '58a122be76f71')");
  //         // echo "INSERT INTO record VALUES ('".uniqid()."', ".$line.", '58a122be76faa');"."<br>";
  //       }
  //     } else
  //       echo $line.' - Imaginative x Arts - New Account'."<br>";
  //   }

  //   fclose($handle);
  // }
      // error opening the file.
  // } 
// echo 'INSERT INTO schedule VALUES ("'.uniqid().'", "1 PM", "4 PM", "3rd Floor, O\'Brien Library", "58a120169c4d4")';

  // $im     = imagecreatefrompng('assets/img/blank_ticket.png');
  // $yellow = imagecolorallocate($im, 255, 198, 0);
  // $white = imagecolorallocate($im, 207, 219, 221);
  //     $black = imagecolorallocate($im, 0, 0, 0);
  //     // imagestring($im, 3, $px, 9, $string, $white);

  //     $font = 'assets/fonts/Montserrat/Montserrat-Light.otf';

  //     $data = array(
  //       "Francis Karl Casao", 
  //       "201310524",
  //       '------',
  //       "Creative x Photography",
  //       "8:00 - 12:00 NN",
  //       "AR215",
  //       '------',
  //       "QWER1234ASDFG"
  //     );
  //     $x = 42;
  //     foreach ($data as $key => $value) {
  //       if(strlen($value) > 24) {
  //         $string = "";
  //         $string2 = "";
  //         $value = explode(" ", $value);
  //         foreach ($value as $n) {
  //           if (strlen($string) + strlen($n) > 23)
  //             $string2 .= $n . " ";
  //           else
  //             $string .= $n . " ";
  //         }

  //         imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($string));
  //         $x+=20;
  //         imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($string2));
  //       } else 
  //         imagettftext($im, 11, 0, 45, $x, $black, $font, strtoupper($value));

  //       $x+=20;
  //     }

  //     $x = 55;
  //     foreach ($data as $key => $value) {
  //       if(strlen($value) > 24) {
  //         $string = "";
  //         $string2 = "";
  //         $value = explode(" ", $value);
  //         foreach ($value as $n) {
  //           if (strlen($string) + strlen($n) > 23)
  //             $string2 .= $n . " ";
  //           else
  //             $string .= $n . " ";
  //         }

  //         imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($string));
  //         $x+=20;
  //         imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($string2));
  //       } else 
  //         imagettftext($im, 11, 0, 460, $x, $black, $font, strtoupper($value));

  //       $x+=20;
  //     }

  //     header("Content-type: image/png");

  //     imagepng($im);
  //     imagedestroy($im);

  // echo password_hash('admin', PASSWORD_DEFAULT);
  echo uniqid()."<br>";
  echo uniqid()."<br>";
  echo uniqid()."<br>";
  echo uniqid()."<br>";
  echo uniqid()."<br>";
?>