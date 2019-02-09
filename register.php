<?php
require 'connection.php';
require 'mailer.php';

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$location = $_POST['location'];
$mobile_no = $_POST['mobile_no'];
$emailarr = explode('@', $email);

//check $email
if (getmxrr($emailarr[1], $arr)) {
    $query = 'SELECT
                email
              FROM
                guests
              WHERE
                email="' . $email . '"';
    $result = mysqli_query($db, $query);
    $num = mysqli_num_rows($result);
    if ($num) {
        $data = array(
            "status_code" => 302,
            "message" => "this email is registered"
        );
    } else {
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date, 0000000000000) * 1000;
        $query = 'INSERT INTO guests VALUES (null,"' . $lastname . '","' . $firstname . '","' . $email . '","' . $location . '","' . $mobile_no . '",' . $date . ')';
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        if ($result) {
            $data = array(
                "status_code" => 200,
                "message" => "success"
            );
            mailer($email, $firstname);
        }
    }
} else {
    $data = array(
        "status_code" => 402,
        "message" => "email does not exist"
    );
}

echo json_encode($data);
?>
