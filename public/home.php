<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dashboard</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="font-montserrat overflow-hidden">

    <section class="flex">

        <!-- Navbar Left Dashboard -->
        <?php include("navbar.php"); ?>

        <!-- Main Dashboard -->
        <section class="w-full h-screen flex justify-center">
            <div class="relative w-full">

                <div class="h-screen flex flex-col">

                    <!-- Main Dashboard Top -->
                    <div class="px-4 py-10 flex flex-row">
                        <div id="bar" class="my-auto w-fit mr-4"><i class="fa-solid fa-bars"></i></div>
                        <div class="flex lg:px-40 md:px-24 px-4 w-full">
                            <div class="flex justify-between w-full">
                                <div>
                                    <h1 class="text-xl font-semibold">Good Morning, Nugraha</h1>
                                    <p class="text-sm">Take a look at the latest update for your clinic <span class="font-semibold">Physio Center !</span></p>
                                </div>
                                <div class="flex gap-10 my-auto">
                                    <div class="flex text-sm">
                                        <div class="mr-4"><i class="fa-solid fa-calendar-alt"></i></div>
                                        <p>Today, <span class="ml-2 font-semibold">3 2023 April</span></p>
                                    </div>
                                    <div class="flex text-sm">
                                        <div class="mr-4"><i class="fa-solid fa-calendar-alt"></i></div>
                                        <p class="font-semibold">08.00 - 12.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Tengah -->
                    <div class="bg-white lg:px-52 md:px-24 px-4 pb-4 overflow-auto h-full text-sm">
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
                        <div>tes</div>
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