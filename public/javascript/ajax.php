<?php

$firstname = $POST_['firstname'];
$lastname = $POST_['lastname'];
$phonenumber = $POST_['phonenumber'];
$email = $POST_['email'];
$message = $POST_['message'];
$errors = array();

if(empty($firstname)){
    array_push($errors, 'First Name is empty');

}
if(empty($lastname)){
    array_push($errors, 'Last Name is empty');

}
if(empty($phonenumber)){
    array_push($errors, 'Phone Number is empty');

}
if(empty($email)){
    array_push($errors, 'Email is empty');

}
if(empty($message)){
    array_push($errors, 'Message is empty');

}
if(count($errors > 0)){
    echo json_encode(array('errors' => $errors));
}else{
    //data
    echo json_encode(array('success' => "Message successfully sent. Thank you {$firstName}!"));
}





?>