<!DOCTYPE html>
<html>

<head>
    <title>Progress...</title>
</head>

<body>
    <!-- Progress bar holder -->
    <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
    <!-- Progress information -->
    <div id="information" style="width"></div>
    <?php
    include('../connector/dbcon.php');
    $dataCabang = $database->getReference('Data_Organisasi')->getValue();
    $checkCabang = "0";
    foreach ($dataCabang as $key => $row) {
        if ($row['status'] == "1") {
            $checkCabang = 1;
        }
    }
    /**
     * The long running PHP process should be placed here before we close
     * the <body> and <html> tags.
     *
     * In the following demo, the long running process is simulated using
     * basic loop with 1 second delay for each iteration.
     */

    /**
     * Set the maximum execution time to 5 minutes (300 seconds).
     * We can flexibly adjust it to fit our need. If we need unlimited time,
     * just set it to 0 but be carefull there will be performance impact.
     */

    if ($checkCabang == "0") {
        set_time_limit(300);

        // Total processes
        $total = 100;




        // Loop through process
        for ($i = 80; $i <= $total; $i++) {
            // Calculate the percentation
            $percent = intval($i / $total * 100) . "%";
            switch ($i) {
                case 10:
                    break;
                case 20:
                    break;
                case 30:
                    break;
                case 40:
                    break;
                case 50:
                    break;
                case 60:
                    break;
                case 70:
                    break;
                case 80:
                    StartingEOD();
                    break;
                case 85:
                    $nextDay = checknextDay();
                    break;
                case 86:
                    $eom = checkeodataueom();
                    $eoy = checkeoy();
                    break;
                case 88:
                    WriteIzinSkrng();
                    break;
                case 89:
                    WriteCutiSkrng();
                    break;
                case 90:
                    CHECKABSENSI();
                    break;
                case 91:
                    PerhitunganAbsen();
                    break;
                case 92:
                    checkHandOver($nextDay);
                    break;
                case 95:
                    if ($eom == "Y") {
                        GajianGuys();
                    }

                    break;
                case 99:
                    OpenAllCabang();
                    break;
                case 100:
                    EODFinish();
                    break;
            }
            echo '<script language="javascript">
            document.getElementById("progress").innerHTML="<div style=\"width:' . $percent . ';background-color:#ddd;\">&nbsp;</div>";
            document.getElementById("information").innerHTML="' . $i . ' % processed.";
            </script>';
            // Javascript for updating the progress bar and information


            // This is for the buffer achieve the minimum size in order to flush data
            echo str_repeat(' ', 1024 * 64);

            // Send output to browser immediately
            flush();

            // Sleep one second so we can see the delay
            sleep(1);
        }
        // Tell user that the process is completed
        echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
        echo '<script language="javascript">window.location.replace("../public/endofdays.php")</script>';
    } else {
        echo '<script language="javascript">document.getElementById("information").innerHTML="Please Close All Cabang"</script>';
        echo '<script language="javascript">window.location.replace("../public/endofdays.php")</script>';
    }

    function WriteIzinSkrng()
    {
        include('../connector/dbcon.php');
        $reference = $database->getReference('Users')->getValue();


        $tanggal = $database->getReference('SystemDate')->getValue();
        $date = $tanggal['year'] . $tanggal['month'] . $tanggal['day'];
        foreach ($reference as $key => $row) {
            $Izin = $database->getReference("Izin/" . $row['nip'])->getValue();
            if ($Izin > 0) {
                foreach ($Izin as $key => $cutiday) {
                    if (intval($cutiday['fromtgl']) <= intval($date) && intval($cutiday['totgl']) >= intval($date)) {
                        $postData = [
                            'date' => strval($date),
                            'day' => strval($tanggal['day']),
                            'key' => strval($date),
                            'month' => strval($tanggal['month']),
                            'nip' => strval($row['nip']),
                            'status' => 'Izin',
                            'waktukeluar' => "-",
                            'waktumasuk' => '-',
                            'year' => strval($tanggal['year'])
                        ];
                        $result = $database->getReference('ABSENSI/' . $row['nip'] . "/" . $date)->set($postData);
                        
                    }
                }
            }
        }
    }
    function WriteCutiSkrng()
    {
        include('../connector/dbcon.php');
        $reference = $database->getReference('Users')->getValue();


        $tanggal = $database->getReference('SystemDate')->getValue();
        $date = $tanggal['year'] . $tanggal['month'] . $tanggal['day'];
        foreach ($reference as $key => $row) {
            $cuti = $database->getReference("Cuti/" . $row['nip'])->getValue();
            if ($cuti > 0) {
                foreach ($cuti as $key => $cutiday) {
                    if (intval($cutiday['fromtanggal']) <= intval($date) && intval($cutiday['totanggal']) >= intval($date)) {
                        $postData = [
                            'date' => strval($date),
                            'day' => strval($tanggal['day']),
                            'key' => strval($date),
                            'month' => strval($tanggal['month']),
                            'nip' => strval($row['nip']),
                            'status' => 'CUTI',
                            'waktukeluar' => "-",
                            'waktumasuk' => '-',
                            'year' => strval($tanggal['year'])
                        ];
                        $result = $database->getReference('ABSENSI/' . $row['nip'] . "/" . $date)->set($postData);
                        if ($result) {
                            $refUsers = $database->getReference('Users/' . $row['nip'])->getValue();
                            $sisacuti = intval($refUsers['cuti']) - 1;
                            $postDataUsers = [
                                'handover' => $refUsers['handover'],
                                'nama' => $refUsers['nama'],
                                'nik' => $refUsers['nik'],
                                'nip' => $refUsers['nip'],
                                'nohp' => $refUsers['nohp'],
                                'password' => $refUsers['password'],
                                'role' => $refUsers['role'],
                                'cuti' => strval($sisacuti),
                                'cabang' => $refUsers['cabang']
                            ];
                            $njas = $database->getReference('Users/' . $row['nip'])->set($postDataUsers);
                        }
                    }
                }
            }
        }
    }
    function CheckAllAddingData()
    {
        include('../connector/dbcon.php');
        $dataCabang = $database->getReference('Users')->getValue();
        foreach ($dataCabang as $key => $row) {
            $getCabang = $database->getReference('Roles/' . $row['role'])->getValue();
            $postData = [
                'handover' => $row['handover'],
                'nama' => $row['nama'],
                'nik' => $row['nik'],
                'nip' => $row['nip'],
                'nohp' => $row['nohp'],
                'password' => $row['password'],
                'role' => $row['role'],
                'cuti' => "12",
                'cabang' => $getCabang['organisasi']
            ];
            $postRef_result = $database->getReference("Users/" . $row['nip'])->set($postData);
        }
    }
    function ResetCutiTahunan()
    {
        include('../connector/dbcon.php');
        $dataCabang = $database->getReference('Users')->getValue();
        foreach ($dataCabang as $key => $row) {
            $postData = [
                'handover' => $row['handover'],
                'nama' => $row['nama'],
                'nik' => $row['nik'],
                'nip' => $row['nip'],
                'nohp' => $row['nohp'],
                'password' => $row['password'],
                'role' => $row['role'],
                'cuti' => "12"
            ];
            $postRef_result = $database->getReference("Users/" . $row['nip'])->set($postData);
        }
    }
    function OpenAllCabang()
    {
        include('../connector/dbcon.php');
        $dataCabang = $database->getReference('Data_Organisasi')->getValue();
        foreach ($dataCabang as $key => $row) {
            $postData = [
                'kode_organisasi' => $row['kode_organisasi'],
                'nama_organisasi' => $row['nama_organisasi'],
                'kode_kota' => $row['kode_kota'],
                'kategori_organisasi' => $row['kategori_organisasi'],
                'induk_organisasi' => $row['induk_organisasi'],
                'status' => "1"
            ];
            $postRef_result = $database->getReference("Data_Organisasi/" . $row['kode_organisasi'])->set($postData);
        }
    }
    function StartingEOD()
    {
        include('../connector/dbcon.php');
        $postData = [
            'key' => "0"
        ];

        $database->getReference('StatusSystem')->set($postData);
    }
    function checknextDay()
    {
        include('../connector/dbcon.php');

        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $reference = $database->getReference('Holidays')->getValue();
        $date = $getSystemDate['day'];
        $month = $getSystemDate['month'];
        $year = $getSystemDate['year'];
        $yearnow = (int) $year;
        $daynow = (int) $date;
        $monthnow = (int) $month;
        $daynow++;
        foreach ($reference as $key => $row) {
            $holimonth = (int) $row['month'];
            $holiyear = (int) $row['year'];
            if ($holimonth == $monthnow && $holiyear == $yearnow) {
                $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $row['month'], $row['year']);
                $check = (int) $row['day'];

                if ($daynow == $check) {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    } else {
                        $daynow++;
                    }
                } else {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    }
                }
            }
        }

        $tanggal = convert($daynow);
        $bulan = convert($monthnow);
        $tahun = $yearnow;
        $nextdayy = $tahun . $bulan . $tanggal;
        return $nextdayy;
    }
    function checkHandOver($nextDay)
    {
        //nanti disini yang di rombak
        include('../connector/dbcon.php');
        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $tanggal = $getSystemDate['year'] . $getSystemDate['month'] . $getSystemDate['day'];


        //checkhandover
        $handover = $database->getReference('HandOver')->getValue();
        if ($handover) {

            foreach ($handover as $key => $row) {
                if (intval($row['totanggal']) <= intval($tanggal) || intval($row['totanggal']) < intval($nextDay)) {
                    $datauser = $database->getReference('Users/' . $row['tonip'])->getValue();
                    $postData = [
                        'handover' => 'false',
                        'nama' => $datauser['nama'],
                        'nik' => $datauser['nik'],
                        'nip' => $datauser['nip'],
                        'nohp' => $datauser['nohp'],
                        'password' => $datauser['password'],
                        'role' => $datauser['role'],
                        'cuti' => $datauser['cuti'],
                        'cabang' => $datauser['cabang']
                    ];
                    $postRef_result = $database->getReference("Users/" . $datauser['nip'])->set($postData);
                    if ($postRef_result) {
                        $reference = $database->getReference('HandOver/' . $datauser['nip'])->remove();
                    }
                }
            }
        }
    }
    function PerhitunganAbsen()
    {

        include('../connector/dbcon.php');
        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $getSystemDate['month'], $getSystemDate['year']);
        $reference = $database->getReference('Holidays')->getValue();
        $countHolidays = 0;
        foreach ($reference as $key => $rowday) {
            if ($rowday['month'] == $getSystemDate['month'] && $rowday['year'] == $getSystemDate['year']) {
                $countHolidays++;
            }
        }
        $hariefektif = $dayofmonth - $countHolidays;
        $getUsers = $database->getReference('Users')->getValue();

        foreach ($getUsers as $key => $row) {
            $getSalary = $database->getReference('Roles/' . $row['role'])->getValue();
            $salaryperday = (int) $getSalary['gaji'] / $hariefektif;
            $getAbsensi = $database->getReference('ABSENSI/' . $row['nip'])->getValue();
            $totalmasuk = 0;
            $totalcuti = 0;
            $totalabsen = 0;
            $totalsakit = 0;
            if ($getAbsensi > 0) {
                foreach ($getAbsensi as $key => $row1) {
                    if ($row1['month'] == $getSystemDate['month'] && $row1['year'] == $getSystemDate['year']) {
                        if ($row1['status'] == "CheckOut") {
                            $totalmasuk++;
                        } else if ($row1['status'] == "ABSEN") {
                            $totalabsen++;
                        } else if ($row1['status'] == "CUTI") {
                            $totalcuti++;
                        } else if ($row1['status'] == "Sakit") {
                            $totalsakit++;
                        }
                    }
                }
            }

            $postData = [
                'nip' => $row['nip'],
                'month' => $getSystemDate['month'],
                'year' => $getSystemDate['year'],
                'total_masuk' => $totalmasuk,
                'total_sakit' => $totalsakit,
                'total_absen' => $totalabsen,
                'total_cuti' => $totalcuti,
                'gaji' => '-'
            ];
            $postRef_result = $database->getReference("Salary/" . $row['nip'] . "/" . $getSystemDate['year'] . $getSystemDate['month'])->set($postData);
        }
    }
    function GajianGuys()
    {

        include('../connector/dbcon.php');
        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $getSystemDate['month'], $getSystemDate['year']);
        $reference = $database->getReference('Holidays')->getValue();
        $countHolidays = 0;
        foreach ($reference as $key => $rowday) {
            if ($rowday['month'] == $getSystemDate['month'] && $rowday['year'] == $getSystemDate['year']) {
                $countHolidays++;
            }
        }
        $hariefektif = $dayofmonth - $countHolidays;
        $getUsers = $database->getReference('Users')->getValue();

        foreach ($getUsers as $key => $row) {
            $getSalary = $database->getReference('Roles/' . $row['role'])->getValue();
            $salaryperday = (int) $getSalary['gaji'] / $hariefektif;
            $getAbsensi = $database->getReference('ABSENSI/' . $row['nip'])->getValue();
            $totalmasuk = 0;
            $totalcuti = 0;
            $totalabsen = 0;
            $totalsakit = 0;
            if ($getAbsensi > 0) {
                foreach ($getAbsensi as $key => $row1) {
                    if ($row1['month'] == $getSystemDate['month'] && $row1['year'] == $getSystemDate['year']) {
                        if ($row1['status'] == "CheckOut") {
                            $totalmasuk++;
                        } else if ($row1['status'] == "ABSEN") {
                            $totalabsen++;
                        } else if ($row1['status'] == "CUTI") {
                            $totalcuti++;
                        } else if ($row1['status'] == "Izin") {
                            $totalsakit++;
                        }
                    }
                }
            }

            $gajibulanini = (int)($totalmasuk + $totalcuti) * $salaryperday;
            $postData = [
                'nip' => $row['nip'],
                'month' => $getSystemDate['month'],
                'year' => $getSystemDate['year'],
                'total_masuk' => $totalmasuk,
                'total_sakit' => $totalsakit,
                'total_absen' => $totalabsen,
                'gaji' => strval($gajibulanini)
            ];
            $postRef_result = $database->getReference("Salary/" . $row['nip'] . "/" . $getSystemDate['year'] . $getSystemDate['month'])->set($postData);
        }
    }
    function checkeodataueom()
    {
        include('../connector/dbcon.php');

        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $reference = $database->getReference('Holidays')->getValue();
        $date = $getSystemDate['day'];
        $month = $getSystemDate['month'];
        $year = $getSystemDate['year'];
        $yearnow = (int) $year;
        $daynow = (int) $date;
        $monthnow = (int) $month;
        $daynow++;
        foreach ($reference as $key => $row) {
            $holimonth = (int) $row['month'];
            $holiyear = (int) $row['year'];
            if ($holimonth == $monthnow && $holiyear == $yearnow) {
                $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $row['month'], $row['year']);
                $check = (int) $row['day'];

                if ($daynow == $check) {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    } else {
                        $daynow++;
                    }
                } else {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    }
                }
            }
        }

        $bulan = convert($monthnow);
        if ($bulan != $month) {
            $eom = "Y";
        } else {
            $eom = "N";
        }

        return $eom;
    }
    function checkeoy()
    {
        include('../connector/dbcon.php');

        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $reference = $database->getReference('Holidays')->getValue();
        $date = $getSystemDate['day'];
        $month = $getSystemDate['month'];
        $year = $getSystemDate['year'];
        $yearnow = (int) $year;
        $daynow = (int) $date;
        $monthnow = (int) $month;
        $daynow++;
        foreach ($reference as $key => $row) {
            $holimonth = (int) $row['month'];
            $holiyear = (int) $row['year'];
            if ($holimonth == $monthnow && $holiyear == $yearnow) {
                $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $row['month'], $row['year']);
                $check = (int) $row['day'];

                if ($daynow == $check) {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    } else {
                        $daynow++;
                    }
                } else {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    }
                }
            }
        }

        $tahun = convert($yearnow);
        if ($tahun != $year) {
            $eoy = "Y";
        } else {
            $eoy = "N";
        }

        return $eoy;
    }
    function CHECKABSENSI()
    {
        include('../connector/dbcon.php');
        $reference = $database->getReference('Users')->getValue();
        $tanggal = $database->getReference('SystemDate')->getValue();
        $date = $tanggal['year'] . $tanggal['month'] . $tanggal['day'];
        foreach ($reference as $key => $row) {
            $ABSENSI = $database->getReference('ABSENSI/' . $row['nip'] . "/" . $date)->getValue();
            if ($ABSENSI == 0) {
                //gakada
                $postData = [
                    'date' => strval($date),
                    'day' => strval($tanggal['day']),
                    'key' => strval($date),
                    'month' => strval($tanggal['month']),
                    'nip' => strval($row['nip']),
                    'status' => 'ABSEN',
                    'waktukeluar' => "-",
                    'waktumasuk' => '-',
                    'year' => strval($tanggal['year'])
                ];
                $database->getReference('ABSENSI/' . $row['nip'] . "/" . $date)->set($postData);
            }
        }
    }
    function EODFinish()
    {
        include('../connector/dbcon.php');

        $getSystemDate = $database->getReference('SystemDate')->getValue();
        $reference = $database->getReference('Holidays')->getValue();
        $date = $getSystemDate['day'];
        $month = $getSystemDate['month'];
        $year = $getSystemDate['year'];
        $yearnow = (int) $year;
        $daynow = (int) $date;
        $monthnow = (int) $month;
        $daynow++;
        foreach ($reference as $key => $row) {
            $holimonth = (int) $row['month'];
            $holiyear = (int) $row['year'];
            if ($holimonth == $monthnow && $holiyear == $yearnow) {
                $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $row['month'], $row['year']);
                $check = (int) $row['day'];

                if ($daynow == $check) {

                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    } else {
                        $daynow++;
                    }
                } else {
                    if ($daynow >= $dayofmonth) {
                        $daynow = 1;
                        $monthnow++;
                        if ($monthnow >= 12) {
                            $yearnow++;
                            $monthnow = 1;
                        }
                    }
                }
            }
        }



        $tanggal = convert($daynow);
        $bulan = convert($monthnow);
        $tahun = $yearnow;
        $postData = [
            'day' => strval($tanggal),
            'month' => strval($bulan),
            'year' => $tahun
        ];
        $postRef_result = $database->getReference("SystemDate")->set($postData);
        if ($postRef_result) {
            $_SESSION['status'] = "Successfully";
            $postData = [
                'key' => "1"
            ];

            $database->getReference('StatusSystem')->set($postData);
        }
    }
    function convert($day)
    {
        if ($day < 10) {
            $char = "0" . $day;
        } else {
            $char = $day;
        }

        return $char;
    }
    ?>
</body>

</html>