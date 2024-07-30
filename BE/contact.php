<?php
session_start();
require_once("Common/dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $db->prepare("INSERT INTO table_contacts (PHONE, EMAIL, SUBJECT, BODY) VALUES (?, ?, ?, ?)");

    if ($stmt->execute([$phone, $email, $subject, $message])) {
        $_SESSION['success'] = "Message sent successfully!";
        header("Location: ../FE/pages/contact.php");
        exit();
    } else {
        $_SESSION['error'] = "Error sending message. Please try again.";
        header("Location: ../FE/pages/contact.php");
        exit();
    }
}
?>
