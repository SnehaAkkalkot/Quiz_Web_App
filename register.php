<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$name = trim($request->Firstname);
$Lname = trim($request->Lastname);
$email = mysqli_real_escape_string($mysqli, trim($request->email));
$pwd = mysqli_real_escape_string($mysqli, trim($request->pwd));
$sql = "INSERT INTO users(name,password,email) VALUES ('$name','$Lname','$email','$pwd')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [
'name' => $name,
'Lname'=>$Lname,
'pwd' => '',
'email' => $email,
'Id' => mysqli_insert_id($mysqli)
];
echo json_encode($authdata);
}
}

?>
