<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_role = $_SESSION['hakaksesmenu'];
    $kode_program = $_POST['checkboxvar'];

    $reference = $database->getReference('Menu')->getValue();
    foreach ($reference as $key => $row) {
        foreach ($kode_program as $kode => $value) {
            if ($row['kode_program'] == $value) {
                $postData = [
                    'kode_program' => $row['kode_program'],
                    'flag' => "true"
                ];
                break;
            } else {
                $postData = [
                    'kode_program' => $row['kode_program'],
                    'flag' => "false"
                ];
            }
        }
        $postRef_result = $database->getReference("HakAksesMenu/" . $kode_role . "/" . $row['kode_program'])->set($postData);
    }
    if ($postRef_result) {
        $_SESSION['status'] = "Successfully Adding Data";
        unset($_SESSION['hakaksesmenu']);
        header("location: ../public/hakaksesmenu.php");
    } else {
        $_SESSION['status'] = "Failed Adding Data";
        unset($_SESSION['hakaksesmenu']);
        header("location: ../public/hakaksesmenu.php");
    }
}

if (isset($_POST['saveseasson'])) {
    $id = $_POST['saveseasson'];
    $_SESSION['hakaksesmenu'] = $id;
    header("location:../public/hakaksesmenu_option.php");
}
