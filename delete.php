<?php
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
