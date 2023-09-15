<?php
session_start();
if (!empty($_SESSION['nip'])) {
    header("location:public/home.php");
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard</title>

    <!-- NEED -->
    <link rel="icon" href="assets/icon/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/icon/logo.png" type="image/x-icon">

    <!-- TAILWINDCSS -->
    <link href="dist/output.css" rel="stylesheet">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="font-montserrat overflow-hidden">

    <section class="flex">

        <section class="w-full h-screen flex justify-center">
            <div class="relative bg-black w-full">
                <div class="h-screen flex flex-col">

                    <!-- Tengah -->
                    <div class="bg-yellow overflow-auto h-full">
                        <div class="flex items-center justify-center h-full text-sm text-white">
                            <div>
                                <div class="text-center font-bold text-xl mb-6">LOG IN</div>
                                <div class="flex justify-center w-full">

                                    <!-- Form Login-->
                                    <form action="API/auth.php" method="POST">
                                        <div class="flex flex-col justify-center">
                                            <input class="placeholder:text-white mt-4 placeholder:border-white text-xs w-80 outline-none bg-black border-[1px] text-white rounded-sm px-4 py-3" type="text" name="nip" placeholder="NIP" required>
                                            <input class="placeholder:text-white mt-4 text-xs w-80 outline-none bg-black border-[1px] text-white rounded-sm px-4 py-3" type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <button class="mt-4 cursor-pointer bg-cyan text-white text-xs rounded-sm py-3 font-semibold w-80" type="submit">LOGIN</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </section>

</body>

</html>