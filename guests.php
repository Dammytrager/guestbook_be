<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description");

require 'connection.php';

$query = 'SELECT * FROM guests ORDER by id DESC';
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
