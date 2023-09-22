<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $password = $_POST['nip'];
    $nik = $_POST['nik'];
    $nohp = $_POST['nohp'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    $getCabang = $database->getReference('Roles/' . $role)->getValue();

    $postData = [
        'nip' => $nip,
        'password' => $nip,
        'nik' => $nik,
        'nohp' => $nohp,
        'nama' => $nama,
        'role' => $role,
        'handover' => 'false',
        'cuti' => "12",
        'cabang' => $getCabang['organisasi']
    ];

    $ref_tabel = "Users";
    $reference = $database->getReference('Users/' . $nip)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location:../public/karyawan.php");
    } else {
        $postRef_result = $database->getReference($ref_tabel . "/" . $nip)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location: ../public/karyawan.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location:../public/karyawan.php");
        }
    }
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Users/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deleting Data";
        header("location: ../public/karyawan.php");
    } else {
        $_SESSION['status'] = "Failed Deleting Data";
        header("location: ../public/karyawan.php");
    }
}
