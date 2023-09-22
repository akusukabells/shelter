<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['close_branch'])) {
    $id = $_POST['close_branch'];
    $ref = $database->getReference('Data_Organisasi/' . $id)->getValue();
    if ($ref) {
        $postData = [
            'kode_organisasi' => $ref['kode_organisasi'],
            'nama_organisasi' => $ref['nama_organisasi'],
            'kode_kota' => $ref['kode_kota'],
            'kategori_organisasi' => $ref['kategori_organisasi'],
            'induk_organisasi' => $ref['induk_organisasi'],
            'status' => "0"
        ];
        $close = $database->getReference("Data_Organisasi/" . $id)->set($postData);
        if ($close) {
            $_SESSION['status'] = "Successfully Close Branch";
            header("location: ../public/statusbranch.php");
        } else {
            $_SESSION['status'] = "Failed Close Branch";
            header("location: ../public/statusbranch.php");
        }
    }
}
if (isset($_POST['open_branch'])) {
    $id = $_POST['open_branch'];
    $ref = $database->getReference('Data_Organisasi/' . $id)->getValue();
    if ($ref) {
        $postData = [
            'kode_organisasi' => $ref['kode_organisasi'],
            'nama_organisasi' => $ref['nama_organisasi'],
            'kode_kota' => $ref['kode_kota'],
            'kategori_organisasi' => $ref['kategori_organisasi'],
            'induk_organisasi' => $ref['induk_organisasi'],
            'status' => "1"
        ];
        $close = $database->getReference("Data_Organisasi/" . $id)->set($postData);
        if ($close) {
            $_SESSION['status'] = "Successfully Open Branch";
            header("location: ../public/statusbranch.php");
        } else {
            $_SESSION['status'] = "Failed Open Branch";
            header("location: ../public/statusbranch.php");
        }
    }
}

if (isset($_POST['open_all'])) {
    $ref = $database->getReference('Data_Organisasi')->getValue();
    foreach ($ref as $key => $row) {
        $postData = [
            'kode_organisasi' => $row['kode_organisasi'],
            'nama_organisasi' => $row['nama_organisasi'],
            'kode_kota' => $row['kode_kota'],
            'kategori_organisasi' => $row['kategori_organisasi'],
            'induk_organisasi' => $row['induk_organisasi'],
            'status' => "1"
        ];
        $database->getReference("Data_Organisasi/" . $row['kode_organisasi'])->set($postData);
    }
    if ($ref) {
        $_SESSION['status'] = "Successfully Open All Branch";
        header("location: ../public/statusbranch.php");
    } else {
        $_SESSION['status'] = "Failed Open All Branch";
        header("location: ../public/statusbranch.php");
    }
}

if (isset($_POST['close_all'])) {
    $ref = $database->getReference('Data_Organisasi')->getValue();
    foreach ($ref as $key => $row) {
        $postData = [
            'kode_organisasi' => $row['kode_organisasi'],
            'nama_organisasi' => $row['nama_organisasi'],
            'kode_kota' => $row['kode_kota'],
            'kategori_organisasi' => $row['kategori_organisasi'],
            'induk_organisasi' => $row['induk_organisasi'],
            'status' => "0"
        ];
        $database->getReference("Data_Organisasi/" . $row['kode_organisasi'])->set($postData);
    }
    if ($ref) {
        $_SESSION['status'] = "Successfully Close All Branch";
        header("location: ../public/statusbranch.php");
    } else {
        $_SESSION['status'] = "Failed Close All Branch";
        header("location: ../public/statusbranch.php");
    }
}
