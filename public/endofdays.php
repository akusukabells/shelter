<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Dashboard</title>

    <!-- NEED -->
    <link rel="icon" href="../assets/icon/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/icon/logo.png" type="image/x-icon">

    <!-- TAILWINDCSS -->
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="../assets/fontawesome6/css/all.css">

</head>

<body class="font-montserrat overflow-hidden">

    <section class="flex">

        <!-- Navbar Left Dashboard -->
        <section id="navbarLeftDashboard" class="border-r-2 border-white h-screen flex justify-center w-20 transform transition-[width] duration-1000 ease-in-out">
            <?php include("navbar.php"); ?>
        </section>

        <!-- Main Dashboard -->
        <section class="w-full h-screen flex justify-center">
            <div class="relative w-full">

                <div class="relative h-screen flex flex-col">

                    <!-- Main Dashboard Top -->
                    <div id="bar" class="absolute my-auto w-fit left-0 cursor-pointer"><i class="fa-solid fa-bars"></i></div>
                    <div class="relative lg:mx-52 md:mx-24 mx-4 my-10 flex flex-row">
                        <div class="flex w-full">
                            <div class="flex justify-between w-full">
                                <div class="flex my-auto">
                                    <h1 class=" text-xl font-bold">Manajemen Karyawan <span class="text-end text-sm font-semibold">/ Reset Password</span> </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Tengah -->
                    <div class="lg:mx-52 md:mx-24 mx-4 mb-4  overflow-auto h-full text-sm">
                        <div class="">
                            <form action="../API/progress.php" method="post">
                                <?php


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
                                    $holiday = (int) $row['day'];
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
                                <div class="flex py-4 border-b-[1px] border-black">
                                    <label for="NIP" class="text-sm w-1/2">Dari</label>
                                    <input class="outline-none text-sm text-black w-full" name="from" type="text" value="<?php echo $getSystemDate['day'] . "/" . $getSystemDate['month'] . "/" . $getSystemDate['year']; ?>" disabled>
                                </div>
                                <div class="flex py-4 border-b-[1px] border-black">
                                    <label for="NIP" class="text-sm w-1/2">Ke</label>
                                    <input class="outline-none text-sm text-black w-full" name="to" type="text" value="<?php echo convert($daynow) . "/" . convert($monthnow) . "/" . $yearnow; ?>" disabled>
                                </div>
                                <div class="flex justify-end">
                                    <input class="outline-none bg-black text-white w-fit px-4 py-2 mt-4 text-sm" name="submit" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Main Dashboard Bottom -->
                    <div class="bg-black px-4 py-2">
                        <div class="text-center text-xs text-white">Admin Dashboard</div>
                    </div>
                </div>

            </div>
        </section>

    </section>

    <script src="../assets/navbar.js"></script>

</body>

</html>