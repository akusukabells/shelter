<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_program = $_POST['kode_program'];
    $nama_menu = $_POST['nama_menu'];
    $parent_menu = $_POST['parent_menu'];



    $reference = $database->getReference('Menu/' . $kode_program)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location:../public/menu.php");
    } else {
        if ($parent_menu == "root" || !$_FILES['fileToUpload']['tmp_name']) {
            $postData = [
                'kode_program' => $kode_program,
                'nama_menu' => $nama_menu,
                'parent_menu' => $parent_menu,
                'url' => 'false'
            ];
            $postRef_result = $database->getReference("Menu/" . $kode_program)->set($postData);
            if ($postRef_result) {
                $_SESSION['status'] = "Successfully";
                header("location: ../public/menu.php");
            } else {
                $_SESSION['status'] = "Failed";
                header("location:../public/menu.php");
            }
        } else {
            $temp = explode(".", $_FILES['fileToUpload']["name"]);
            $newfilename = $kode_program . '.' . end($temp);
            $success = $bucket->upload(
                fopen($_FILES['fileToUpload']['tmp_name'], 'r'),
                [
                    'predefinedAcl' => 'publicRead',
                    'name' => 'Icon/' . $newfilename
                ]
            );
            $object = $bucket->object('Icon/' . $newfilename);
            $timestamp = (new \DateTime('tomorrow'));
            $url = $object->signedUrl($timestamp);
            $image_url = 'https://storage.googleapis.com/' . "absensi-33547.appspot.com/Icon/" . $newfilename;
            $postData = [
                'kode_program' => $kode_program,
                'nama_menu' => $nama_menu,
                'parent_menu' => $parent_menu,
                'url' => $image_url
            ];
            $postRef_result = $database->getReference("Menu/" . $kode_program)->set($postData);
            if ($postRef_result) {
                $_SESSION['status'] = "Successfully";
                header("location: ../public/menu.php");
            } else {
                $_SESSION['status'] = "Failed";
                header("location:../public/menu.php");
            }
        }
    }
}
if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Menu/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully";
        header("location: ../public/menu.php");
    } else {
        $_SESSION['status'] = "Failed";
        header("location: ../public/menu.php");
    }
}
if (isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
    echo $edit_id;
}
