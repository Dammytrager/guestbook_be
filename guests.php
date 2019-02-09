<?php
require 'connection.php';

$query = 'SELECT * FROM guests';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$data = array();
if ($result) {
    while ($row = mysqli_fetch_array($result)){
        $data[] = array(
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'email' => $row['email'],
            'location' => $row['location'],
            'mobile_no' => $row['mobile_no'],
            'date' => $row['date']
        );
    }
    $output = array(
        'status_code' => 200,
        'message' => 'success',
        'data'=> $data
    );
    echo json_encode($output);
}
