<?php
  // $link = mysqli_connect('localhost', 'root', 'Superadmin123', 'acp');
  // $query = "SELECT id FROM person";

  // $result = mysqli_query($link, $query);
  // echo "INSERT INTO person_type VALUES";  
  // while ($row = mysqli_fetch_assoc($result)) {
  //   echo "('".uniqid()."', ".$row['id'].", 'Student'),";
  //   echo "<br>";
  // }

  $test = array("first" => "1st value", "second" => "2nd value");
  echo "UPDATE person SET ";
  while($value = current($test)) {
    echo key($test)." = ".$value;
    echo ", ";
    next($test);
  }
?>