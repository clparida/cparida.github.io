<?php
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$affiliation = htmlspecialchars($_POST['affiliation']);
$position = htmlspecialchars($_POST['position']);
$message = htmlspecialchars($_POST['message']);

if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $receiver = "chandanlal.parida@gmail.com"; // your email
        $subject = "From: $name <$email>";
        $body = "Name: $name\nEmail: $email\nAffiliation: $affiliation\nPosition: $position\nMessage:\n$message\n\nRegards,\n$name";
        $sender = "From: $email";

        if(mail($receiver, $subject, $body, $sender)){
            echo "Your message has been sent";
        }else{
            echo "Sorry, failed to send your message!";
        }
    }else{
        echo "Enter a valid email address!";
    }
}else{
    echo "Email and message field are required!";
}
?>
