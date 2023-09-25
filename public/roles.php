<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles - Dashboard</title>

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

    <style>
        .listbarang {
            border-collapse: collapse;
            width: 100%;
        }

        .listbarang td,
        .listbarang th {
            border: 0.5px solid #ddd;
            padding: 8px;
        }

        .listbarang tr:hover {
            background-color: #ddd;
        }

        .listbarang th {
            font-size: 12px;
            background-color: #16161a;
        }

        select {
            padding: 12px;
            /* background-color: red !important; */
            outline: none !important;
            font-size: 12px;
        }
    </style>
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
                <div class="top-4 right-4 absolute bg-red-600 ">
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

                <!-- Form Popup -->
                <div id="popupForm" class="hidden absolute backdrop-blur-sm z-50 h-full w-full">
                    <div class="flex justify-center items-center h-full">
                        <div class="relative bg-black h-fit w-1/3">
                            <i onclick="closePopupForm();" class="cursor-pointer absolute bg-red-600 font-semibold text-white top-0 p-4 right-0 fa fa-x"></i>
                            <h1 class="text-white text-center font-semibold my-10">Tambah Roles Organisasi</h1>
                            <div class="px-4 pb-4">
                                <form action="../API/roles.php" method="post">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex border-b-[1px] border-white py-1">
                                            <label for="kodeprovinsi" class="my-auto w-1/3 text-white whitespace-nowrap text-sm">Kode Role</label>
                                            <input class="outline-none w-full px-4 py-3 text-sm bg-black text-white" type="text" name="kode_role" placeholder="Kode Role">
                                        </div>
                                        <div class="flex border-b-[1px] border-white py-1">
                                            <label for="kodeprovinsi" class="my-auto w-1/3 text-white whitespace-nowrap text-sm">Nama Role</label>
                                            <input class="outline-none w-full px-4 py-3 text-sm bg-black text-white" type="text" name="nama_role" placeholder="Nama Organisasi">
                                        </div>
                                        <div class="flex border-b-[1px] border-white py-1">
                                            <label for="kodeprovinsi" class="my-auto w-1/3 text-white whitespace-nowrap text-sm">Gaji</label>
                                            <input class="outline-none w-full px-4 py-3 text-sm bg-black text-white" type="text" name="gaji" placeholder="Gaji">
                                        </div>
                                        <div class="flex border-b-[1px] border-white py-1">
                                            <label for="cars" class="my-auto w-1/3 text-white whitespace-nowrap text-sm">Organisasi</label>
                                            <select class="w-full bg-black text-white" name="organisasi">
                                                <?php
                                                $organisasi = $database->getReference('Data_Organisasi')->getValue();
                                                foreach ($organisasi as $key => $row) {
                                                    echo "<option value=" . $row['kode_organisasi'] . ">" . $row['nama_organisasi'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="flex border-b-[1px] border-white py-1">
                                            <label for="cars" class="my-auto w-1/3 text-white whitespace-nowrap text-sm">Level</label>
                                            <select class="w-full bg-black text-white" name="flag">
                                                <option value="1">Administrator</option>
                                                <option value="2">Supervisor</option>
                                                <option value="3">User</option>
                                            </select>
                                        </div>
                                        <input class="cursor-pointer w-full px-4 py-3 text-sm text-white bg-cyan" name="submit" type="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative h-screen flex flex-col">

                    <!-- Main Dashboard Top -->
                    <div id="bar" class="absolute my-auto w-fit left-0 cursor-pointer"><i class="fa-solid fa-bars"></i></div>
                    <div class="relative lg:mx-52 md:mx-24 mx-4 my-10 flex flex-row">
                        <div class="flex w-full">
                            <div class="flex justify-between w-full">
                                <div class="flex my-auto">
                                    <h1 class=" text-xl font-bold">Manajemen Karyawan <span class="text-end text-sm font-semibold">/ Roles</span> </h1>
                                </div>
                                <div onclick="openPopupForm();" class="cursor-pointer bg-black text-white px-3 py-2 text-xs font-semibold"><i class="fa fa-plus mr-3"></i><span>Add Roles</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Tengah -->
                    <div class="lg:mx-52 md:mx-10 mx-4 pb-4 overflow-auto h-full text-sm">

                        <!-- Table -->
                        <div>
                            <table className="table-fixed listbarang" style="width: -webkit-fill-available;">
                                <thead style="height: 50px; background-color: #11101d; color: white;">
                                    <tr>
                                        <th class="w-10">No</th>
                                        <th>Kode</th>
                                        <th>Nama Roles</th>
                                        <th>Organisasi</th>
                                        <th class="w-1/12">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="height: 50px;">

                                    <?php
                                    $reference = $database->getReference('Roles')->getValue();
                                    if ($reference > 0) {
                                        $i = 1;
                                        foreach ($reference as $key => $row) { ?>
                                            <tr style="height: 75px">
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $row['kode_role']; ?></td>
                                                <td class="text-center"><?php echo $row['nama_role']; ?></td>
                                                <td class="text-center"><?php $organisasi = $database->getReference('Data_Organisasi/' . $row['organisasi'])->getValue();
                                                                        echo $organisasi['nama_organisasi'];
                                                                        ?></td>
                                                <td class="text-center">
                                                    <form action="../API/roles.php" method="post">
                                                        <div class="flex justify-center gap-4">
                                                            <button name="edit" type="submit" class="cursor-pointer flex h-fit bg-green-600 text-white px-2 py-2" value="<?php echo $row['kode_role']; ?>"><i class="w-10 flex my-auto fa fa-pen-to-square"></i>Edit</button>
                                                            <button name="delete" type="submit" class="cursor-pointer flex h-fit bg-red-600 text-white px-2 py-2" value="<?php echo $row['kode_role']; ?>"><i class="w-10 flex my-auto fa fa-trash"></i>Delete</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>

                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
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