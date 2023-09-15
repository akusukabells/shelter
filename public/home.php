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

                <div class="relative h-screen flex flex-col">

                    <!-- Main Dashboard Top -->
                    <div id="bar" class="absolute my-auto w-fit left-0 cursor-pointer"><i class="fa-solid fa-bars"></i></div>
                    <div class="relative lg:mx-52 md:mx-24 mx-4 my-10 flex flex-row">
                        <div class="flex w-full">
                            <div class="flex justify-between w-full">
                                <div>
                                    <h1 class="text-xl font-bold">Home</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Tengah -->
                    <div class="bg-white lg:mx-52 md:mx-24 mx-4 pb-4 overflow-auto h-full text-sm">
                        <div>
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