<?php
session_start();
include('../connector/dbcon.php');
if (isset($_POST['submit'])) {
    $kode_holidays = $_POST['date'];
    $keterangan = $_POST['keterangan'];
    $test = str_replace("-", "", $kode_holidays);
    $day = substr($test, 6);
    $month = substr($test, 4, 2);
    $year = substr($test, 0, 4);
    $tanggal = $day . "-" . $month . "-" . $year;
    $postData = [
        'kode_holidays' => $test,
        'tanggal' => $tanggal,
        'keterangan' => $keterangan,
        'day' => $day,
        'month' => $month,
        'year' => $year,
        'status' => "true"
    ];

    $reference = $database->getReference('Holidays/' . $test)->getValue();
    if ($reference > 0) {
        $_SESSION['status'] = "Data Sudah Ada";
        header("location:../public/holidays.php");
    } else {
        $postRef_result = $database->getReference("Holidays/" . $test)->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully Adding Data";
            header("location: ../public/holidays.php");
        } else {
            $_SESSION['status'] = "Failed Adding Data";
            header("location:../public/holidays.php");
        }
    }
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['delete'];
    $del_ref = $database->getReference('Holidays/' . $del_id)->remove();
    if ($del_ref) {
        $_SESSION['status'] = "Successfully Deteling Data";
        header("location: ../public/holidays.php");
    } else {
        $_SESSION['status'] = "Failed Deteling Data";
        header("location: ../public/holidays.php");
    }
}
if (isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
    echo $edit_id;
}
