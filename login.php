<?php
  require 'connection.php';

  $username=$_POST['username'];
  $password=$_POST['password'];
  $query='SELECT
            username
          AND
            password
          FROM
            admin
          WHERE
            username="'.$username.'"
          AND
            password="'.$password.'"';
  $result=mysqli_query($db,$query) or die(mysqli_error($db));
  $num=mysqli_num_rows($result);
  if ($num) {
    $data=array(
      "status_code"=>200,
      "message"=>"login successful"
    );
  } else {
    $data=array(
      "status_code"=>401,
      "message"=>"unauthorized login"
    );
  }

  echo json_encode($data);


 ?>
