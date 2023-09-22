<?php
session_start();
include('../connector/dbcon.php');
echo $_POST['submit'];
if (isset($_POST['submit'])) {
    $kode_kota = $_POST['kode_kota'];
    $nama_kota = $_POST['nama_kota'];
    $kode_provinsi = $_POST['kode_provinsi'];

    $postData = [
        'kode_kota' => $kode_kota,
        'nama_kota' => $nama_kota,
        'kode_provinsi' => $kode_provinsi
    ];

    $reference = $database->getReference('Kota/' . $kode_kota)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location: ../public/kota_kabupaten.php");
    } else {
        $postRef_result = $database->getReference("Kota/" . $kode_kota)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location: ../public/kota_kabupaten.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location: ../public/kota_kabupaten.php");
        }
    }
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Kota/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/kota_kabupaten.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/kota_kabupaten.php");
    }
}

if (isset($_POST['edit'])) {
    $_SESSION['edit'] = $_POST['edit'];
    header("location: ../edit/kota_kabupaten.php");
}

if (isset($_POST['submit_edit'])) {
    $kode_kota = $_SESSION['edit'];
    $nama_kota = $_POST['nama_kota'];
    $kode_provinsi = $_POST['kode_provinsi'];

    $postData = [
        'kode_kota' => $kode_kota,
        'nama_kota' => $nama_kota,
        'kode_provinsi' => $kode_provinsi
    ];


    $postRef_result = $database->getReference("Kota/" . $kode_kota)->set($postData);
    if ($postRef_result) {
        $_SESSION['status'] = "Successfully Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/kota_kabupaten.php");
    } else {
        $_SESSION['status'] = "Failed Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/kota_kabupaten.php");
    }
}
