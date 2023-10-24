<?php
session_start();
include('../connector/dbcon.php');
$nip = $_POST['nip'];
$password = $_POST['password'];
$reference = $database->getReference('Users/' . $nip)->getValue();
if ($reference > 0) {
    if ($reference['nip'] == $nip && $reference['password'] == $password) {
        $reference2 = $database->getReference('Roles/' . $reference['role'])->getValue();
        if ($reference2['flag'] == 1) {
            $_SESSION['nip'] = $nip;
            $_SESSION['nama'] = $reference['nama'];
            $_SESSION['role'] = $reference['role'];

            header("location: ../public/home.php");
        } else {
            $_SESSION['status'] = "Anda Bukan Admin";
            header("location:../index.php");
        }
    } else {
        $_SESSION['status'] = "NIP atau Password Tidak Valid";
        header("location:../index.php");
    }
} else {
    $_SESSION['status'] = "NIP atau Password Tidak Valid";
    header("location:../index.php");
}
