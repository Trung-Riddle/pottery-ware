<?php
    //* import library phpmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    if(isset($_GET['act'])){
        require '../model/PHPMailer-master/src/Exception.php';
        require '../model/PHPMailer-master/src/PHPMailer.php';
        require '../model/PHPMailer-master/src/SMTP.php';
    }else{
        require '../PHPMailer-master/src/Exception.php';
        require '../PHPMailer-master/src/PHPMailer.php';
        require '../PHPMailer-master/src/SMTP.php';
    }
    // include "./PHPMailer-master/src/OAuth.php";
    // include "./PHPMailer-master/src/POP3.php";
    //* Send mail to user when sign up successfully
    function signUp($title, $content, $email, $user_name){
        $mail = new PHPMailer(true);  
        // print_r($mail);
        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nhatvichung@gmail.com';                     //SMTP username
            $mail->Password   = 'joczgpqkblyabbvp';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nhatvichung@gmail.com', 'Pettery Ware');
            $mail->addAddress($email, $user_name);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    //* Send mail check gmail user when user sign up
    function checkUserSignup($title, $content, $email, $user_name){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nhutvichung@gmail.com'; 
            $mail->Password   = 'vlbwobhmjhjypxjn';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('nhutvichung@gmail.com', 'Pettery Ware');
            $mail->addAddress($email, $user_name);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function sendMail($title, $content, $email, $user_name){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nhatvichung@gmail.com'; 
            $mail->Password   = 'joczgpqkblyabbvp';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('nhatvichung@gmail.com', 'Pettery Ware');
            $mail->addAddress($email, $user_name);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>