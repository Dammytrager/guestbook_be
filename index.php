<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description");

$domain = $_SERVER['HTTP_HOST'];
$prefix = "https://";

if (empty($_GET)) {
    $message = array(
        'status' => "works like charm",
        "status_code" => 200
    );
    echo json_encode($message);
} else {
    switch ($_GET['action']) {
        case 'login':
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $postdata = array(
                "username" => $data->username,
                "password" => $data->password
            );
            $relative = "/login.php";
            $url = $prefix . $domain . $relative;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
            break;

        case 'register':
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $postdata = array(
                "lastname" => $data->lastname,
                "firstname" => $data->firstname,
                "email" => $data->email,
                "location" => $data->location,
                "mobile_no" => $data->mobile_no
            );
            $relative = "/register.php";
            $url = $prefix . $domain . $relative;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
            break;
        case 'guests':
            $relative = "/guests.php";
            $url = $prefix . $domain . $relative;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
            break;
        case 'delete':
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $postdata = array(
                'id' => $data->id
            );
            $relative = "/delete.php";
            $url = $prefix . $domain . $relative;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
            break;

        default:
            // code...
            break;
    }
}
?>
