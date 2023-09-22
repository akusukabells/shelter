<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_organisasi = $_POST['kode_organisasi'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $kode_kota = $_POST['kode_kota'];
    $kategori_organisasi = $_POST['kategori_organisasi'];
    $induk_organisasi = $_POST['induk_organisasi'];

    $postData = [
        'kode_organisasi' => $kode_organisasi,
        'nama_organisasi' => $nama_organisasi,
        'kode_kota' => $kode_kota,
        'kategori_organisasi' => $kategori_organisasi,
        'induk_organisasi' => $induk_organisasi,
        'status' => "1"
    ];

    $reference = $database->getReference('Data_Organisasi/' . $kode_organisasi)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location:../public/data_organisasi.php");
    } else {
        $postRef_result = $database->getReference("Data_Organisasi/" . $kode_organisasi)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location:../public/data_organisasi.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location:../public/data_organisasi.php");
        }
    }
}
if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Data_Organisasi/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/data_organisasi.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/data_organisasi.php");
    }
}
if (isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
    echo $edit_id;
}
