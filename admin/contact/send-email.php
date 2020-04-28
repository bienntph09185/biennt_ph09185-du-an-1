<?php
session_start();
require '../../config/utils.php';
checkAdminLoggedIn();
// Require libraryraries PHP Mailer
require '../_share/library/PHPMailer/src/Exception.php';
require '../_share/library/PHPMailer/src/PHPMailer.php';
require '../_share/library/PHPMailer/src/SMTP.php';
// Get infomation
$recceiver = $_POST['recceiver'];
$subject = $_POST['subject'];
$reply_content = $_POST['reply_content'];
$id = $_POST['id'];
$reply_by = $_POST['reply_by'];

$listRecceiver = explode(",", $recceiver);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet = 'utf8';                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'nguyentubien13101996@gmail.com';                     // SMTP username
    $mail->Password   = 'Nguyentubien11o2!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bienntph09185@fpt.edu.com', 'Tự Biên');
    foreach ($listRecceiver as $recceiverEmail) {
        $mail->addAddress($recceiverEmail);
    }
    $mail->addReplyTo('bienntph09185@fpt.edu.vn', 'Tự Biên');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $reply_content;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message have been sent';

    # Update database
    $updateContactQuery = "update contact set
                                status = '1',
                                reply_by = '$reply_by',
                                reply_for = '$id',
                                reply_content = '$reply_content'
                            where id = '$id'";
    queryExecute($updateContactQuery, false);
    header("location: " . ADMIN_URL . "contact");
    die;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}