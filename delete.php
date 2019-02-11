<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description");

require 'connection.php';

$id = $_POST['id'];
$query = 'DELETE FROM guests WHERE id = '.$id;
$result = mysqli_query($db, $query);
if($result) {
    $output = array(
        'status_code' => 200,
        'message' => 'Guest removed successfully'
    );
    echo json_encode($output);
}
