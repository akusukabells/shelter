<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $reference = $database->getReference('Users/' . $nip)->getValue();
    if ($reference > 0) {
        $postRef_result = $database->getReference("Users/" . $nip . "/password")->set($nip);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully";
            header("location: ../public/resetpassword.php");
        } else {
            $_SESSION['status'] = "Failed";
            header("location:../public/resetpassword.php");
        }
    } else {
        $_SESSION['status'] = "Data Tidak ada";
        header("location:../public/resetpassword.php");
    }
}
