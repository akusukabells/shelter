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
            <?php
            if (isset($_SESSION['status'])) {
            ?>
                <div class="z-50 top-4 right-4 absolute bg-red-600 ">
                    <div class="px-6 py-4 flex text-white">
                        <div class="my-auto mr-4 text-sm"><i class="fa fa-warning"></i></div>
                        <h1 class="my-auto text-sm"><?php echo $_SESSION['status']; ?></h1>
                    </div>
                </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
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
                            <form action="../API/reset_password.php" method="post">

                                <!-- Text -->
                                <div class="flex py-4 border-b-[1px] border-black">
                                    <label for="NIP" class="text-sm w-1/2">NIP</label>
                                    <input class="outline-none text-sm text-black w-full" type="text" name="nip" id="NIP" placeholder="Masukan NIP">
                                </div>
                                <!-- Submit -->
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

    <script>
        // Konten Checkbox
        document.getElementById("openKontenCheckbox").addEventListener("click", () => {
            const kontentCheckbox = document.getElementById("kontentCheckbox");
            const symbolKontentCheckbox = document.getElementById("symbolKontentCheckbox");

            kontentCheckbox.classList.toggle("mt-3");

            if (document.querySelectorAll("#kontentCheckbox")[0].className == "h-0 transform overflow-hidden transition-[height] duration-1000 ease-in-out" || "transform overflow-hidden transition-[height] duration-1000 ease-in-out h-0") {
                symbolKontentCheckbox.classList.toggle("fa-remove");
            };

            kontentCheckbox.classList.toggle("h-0");
            kontentCheckbox.classList.toggle("h-fit");
        });
    </script>

</body>

</html>