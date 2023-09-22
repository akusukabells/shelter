<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_role = $_POST['kode_role'];
    $nama_role = $_POST['nama_role'];
    $organisasi = $_POST['organisasi'];
    $flag = $_POST['flag'];
    $gaji = $_POST['gaji'];

    $postData = [
        'kode_role' => $kode_role,
        'nama_role' => $nama_role,
        'organisasi' => $organisasi,
        'flag' => $flag,
        'gaji' => $gaji
    ];

    $reference = $database->getReference('Roles/' . $kode_role)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location::../public/roles.php");
    } else {
        $postRef_result = $database->getReference("Roles/" . $kode_role)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location:../public/roles.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location:../public/roles.php");
        }
    }
}
if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Roles/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/roles.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/roles.php");
    }
}
if (isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
    echo $edit_id;
}
