<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_organisasi = $_POST['kode_organisasi'];
    $nama_organisasi = $_POST['nama_organisasi'];

    $postData = [
        'kode_organisasi' => $kode_organisasi,
        'nama_organisasi' => $nama_organisasi
    ];

    $reference = $database->getReference('Kategori_Organisasi/' . $kode_organisasi)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location: ../public/kategori_organisasi.php");
    } else {
        $postRef_result = $database->getReference("Kategori_Organisasi/" . $kode_organisasi)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location: ../public/kategori_organisasi.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location: ../public/kategori_organisasi.php");
        }
    }
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Kategori_Organisasi/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/kategori_organisasi.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/kategori_organisasi.php");
    }
}

if (isset($_POST['edit'])) {
    $_SESSION['edit'] = $_POST['edit'];
    header("location: ../edit/kategori_organisasi.php");
}


if (isset($_POST['submit_edit'])) {
    $kode_organisasi = $_SESSION['edit'];
    $nama_organisasi = $_POST['nama_organisasi'];

    $postData = [
        'kode_organisasi' => $kode_organisasi,
        'nama_organisasi' => $nama_organisasi
    ];


    $postRef_result = $database->getReference("Kategori_Organisasi/" . $kode_organisasi)->set($postData);
    if ($postRef_result) {
        $_SESSION['status'] = "Successfully Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/kategori_organisasi.php");
    } else {
        $_SESSION['status'] = "Failed Editing Data";
        unset($_SESSION['edit']);
        header("location: ../public/kategori_organisasi.php");
    }
}
