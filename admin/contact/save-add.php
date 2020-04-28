<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);
if ($name && $email && $subject && $message) {
    $status = INACTIVE;
}
// validate bằng php
$nameerr = "";
$emailerr = "";
$subjecterr = "";
$messageerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email
if (strlen($email) == 0) {
    $emailerr = "Yêu cầu nhập email!";
}
if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "Không đúng định dạng email";
}


// check subject
if (strlen($subject) < 2 || strlen($subject) > 191) {
    $subjecterr = "Yêu cầu nhập chủ đề phản hồi nằm trong khoảng 2-191 ký tự";
}

// check message
if (strlen($message) < 2) {
    $messageerr = "Yêu cầu nhập nội dung phản hồi, không được để trống";
}

if ($nameerr . $emailerr . $subjecterr . $messageerr != "") {
    header('location: ' . ADMIN_URL . "contact/add-form.php?nameerr=$nameerr&emailerr=$emailerr&subject=$subjecterr&message=$messageerr");
    die;
}

// query upload to DB
$insertContactQuery = "insert into contact
                          (name, email, subject, message  , status)
                    values
                          ('$name', '$email', '$subject', '$message', '$status')";
// dd($insertContactQuery);
$reply_now = 'Xin cảm ơn bạn đã phản hồi tới chúng tôi, bạn sẽ nhận được phản hồi của chúng tôi sớm nhất. Trân trọng cảm ơn';
queryExecute($insertContactQuery, false);
// header("location: " . BASE_URL . "contact-us.php?reply_now=$reply_now");
header("location: " . THEME_ASSET_URL . "contact.php");
die;
