<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_provinsi = $_POST['kode_provinsi'];
    $nama_provinsi = $_POST['nama_provinsi'];

    $postData = [
        'kode_provinsi' => $kode_provinsi,
        'nama_provinsi' => $nama_provinsi
    ];

    $reference = $database->getReference('Provinsi/' . $kode_provinsi)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location: ../public/provinsi.php");
    } else {
        $postRef_result = $database->getReference("Provinsi/" . $kode_provinsi)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location: ../public/provinsi.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location: ../public/provinsi.php");
        }
    }
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Provinsi/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/provinsi.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/provinsi.php");
    }
}
if (isset($_POST['edit'])) {
    $_SESSION['edit'] = $_POST['edit'];
    header("location: ../edit/provinsi.php");
}


if (isset($_POST['submit_edit'])) {
    $kode_provinsi = $_SESSION['edit'];
    $nama_provinsi = $_POST['nama_provinsi'];

    $postData = [
        'kode_provinsi' => $kode_provinsi,
        'nama_provinsi' => $nama_provinsi
    ];


    $postRef_result = $database->getReference("Provinsi/" . $kode_provinsi)->set($postData);
    if ($postRef_result) {
        $_SESSION['status'] = "Successfully Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/provinsi.php");
    } else {
        $_SESSION['status'] = "Failed Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/provinsi.php");
    }
}
