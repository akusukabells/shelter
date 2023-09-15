<?php
session_start();
if (empty($_SESSION['nip'])) {
    header("location: ../index.php");
}

include("../connector/dbcon.php");
$tanggal = $database->getReference('SystemDate')->getValue();
$date = $tanggal['day'] . "/" . $tanggal['month'] . "/" . $tanggal['year'];
?>

<section id="navbarLeftDashboard" class="border-r-2 border-white h-screen flex justify-center w-20 transform transition-[width] duration-1000 ease-in-out">
    <div class="relative w-full">

        <div class="h-screen flex flex-col">

            <!-- Dashboard Navbar Left Top -->
            <div class="bg-black">
                <div class="flex justify-center items-center h-40">
                    <img draggable="false" class="h-fit w-20" src="../assets/icon/logo.png" alt="Logo.png">
                </div>
                <div class="mx-4 mb-4 text-center whitespace-nowrap text-xs overflow-hidden text-white">
                    <p class="ml-2 font-semibold"><?php echo $date; ?></p>
                </div>
            </div>

            <!-- Dashboard Navbar Left Mid -->
            <div class="bg-black overflow-auto h-full">

                <!-- Dashboard Navbar Left Mid Short -->
                <div id="shortDashboard" class="flex text-xs py-4 flex-col gap-4">

                    <!-- Menu Home -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-home"></i>
                        </div>
                    </div>

                    <!-- Menu Wilayah -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-earth-asia"></i>
                        </div>
                    </div>

                    <!-- Menu Organisasi -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-building-user"></i>
                        </div>
                    </div>

                    <!-- Menu Karyawan -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-id-badge"></i>
                        </div>
                    </div>

                    <!-- Menu Manajemen Admin -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-gear"></i>
                        </div>
                    </div>


                    <!-- Menu Arsip -->
                    <div onclick="openLongDashboard()" class="cursor-pointer hover:bg-gray flex justify-center text-white text-sm mx-4 py-3.5">
                        <div class="relative my-auto"><i class="text-xs text-white fa-solid fa-folder"></i>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Navbar Left Mid Long-->
                <div id="longDashboard" class="hidden py-4 text-xs flex-col gap-4 text-white">

                    <!-- Menu Dashboard-->
                    <div class="mx-4 cursor-pointer">
                        <a href="home.php">
                            <div id="menuHome" class="hover:bg-gray flex justify-between px-4 py-4">
                                <div class="flex">
                                    <div><i class="w-8 fa-solid fa-house"></i></div>
                                    <div class="line-clamp-1">Home</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Menu Wilayah-->
                    <div class="mx-4 cursor-pointer">
                        <div id="menuWilayah" class="hover:bg-gray flex justify-between px-4 py-4">
                            <div class="flex">
                                <div><i class="w-8 fa-solid fa-earth-asia"></i></div>
                                <div class="line-clamp-1">Wilayah</div>
                            </div>
                            <div class="my-auto"><i id="arrowWilayah" class="rotate-0 fa-solid fa-caret-down"></i></div>
                        </div>

                        <!-- SubMenu Wilayah -->
                        <div id="subMenuWilayah" class="h-0 overflow-hidden">
                            <div class="hover:bg-gray">
                                <a href="provinsi.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Provinsi</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="kota_kabupaten.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Kota / Kabupaten</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Organisasi-->
                    <div class="mx-4 cursor-pointer">
                        <div id="menuOrganisasi" class="hover:bg-gray flex justify-between px-4 py-4">
                            <div class="flex">
                                <div><i class="w-8 fa-solid fa-building-user"></i></div>
                                <div class="line-clamp-1">Organisasi</div>
                            </div>
                            <div class="my-auto"><i id="arrowOrganisasi" class="rotate-0 fa-solid fa-caret-down"></i></div>
                        </div>

                        <!-- SubMenu Organisasi -->
                        <div id="subMenuOrganisasi" class="h-0 overflow-hidden">
                            <div class="hover:bg-gray">
                                <a href="kategori_organisasi.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Kategori Organisasi</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="data_organisasi.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Data Organisasi</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Karyawan -->
                    <div class="mx-4 cursor-pointer">
                        <div id="menuKaryawan" class="hover:bg-gray flex justify-between px-4 py-4">
                            <div class="flex">
                                <div><i class="w-8 fa-solid fa-id-badge"></i></div>
                                <div class="line-clamp-1">Manajemen Karyawan</div>
                            </div>
                            <div class="my-auto"><i id="arrowKaryawan" class="rotate-0 fa-solid fa-caret-down"></i></div>
                        </div>

                        <!-- SubMenu Karyawan -->
                        <div id="subMenuKaryawan" class="h-0 overflow-hidden">
                            <div class="hover:bg-gray">
                                <a href="karyawan.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Karyawan</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="resetpassword.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Reset Password</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="roles.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Role</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="menu.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Menu</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="hakaksesmenu.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Hak Akses Menu</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Manajemen Admin -->
                    <div class="mx-4 cursor-pointer">
                        <div id="menuManajemenAdmin" class="hover:bg-gray flex justify-between px-4 py-4">
                            <div class="flex">
                                <div><i class="w-8 fa-solid fa-gear"></i></div>
                                <div class="line-clamp-1">Manajemen Admin</div>
                            </div>
                            <div class="my-auto"><i id="arrowManajemenAdmin" class="rotate-0 fa-solid fa-caret-down"></i></div>
                        </div>

                        <!-- SubMenu Manajemen Admin -->
                        <div id="subMenuManajemenAdmin" class="h-0 overflow-hidden">
                            <div class="hover:bg-gray">
                                <a href="holidays.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Holidays</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="qrcode.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">QR Code</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="statusbranch.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Status Branch</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="endofday.php" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">End Of Day</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>



                    <!-- Menu Arsip -->
                    <div class="mx-4 cursor-pointer">
                        <div id="menuArsip" class="hover:bg-gray flex justify-between px-4 py-4">
                            <div class="flex">
                                <div><i class="w-8 fa-solid fa-folder"></i></div>
                                <div class="line-clamp-1">Arsip</div>
                            </div>
                            <div class="my-auto"><i id="arrowArsip" class="rotate-0 fa-solid fa-caret-down"></i></div>
                        </div>

                        <!-- SubMenu Arsip -->
                        <div id="subMenuArsip" class="h-0 overflow-hidden">
                            <div class="hover:bg-gray">
                                <a href="" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Arsip Absensi</div>
                                    </div>
                                </a>
                            </div>
                            <div class="hover:bg-gray">
                                <a href="" class="flex justify-between px-4 py-4">
                                    <div class="flex">
                                        <div><i class="ml-1 w-7 text-[5px] fa-solid fa-circle"></i></div>
                                        <div class="line-clamp-1">Arsip Gaji</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Dashboard Navbar Left Bottom -->
            <div class="bg-black p-4 py-7">
                <div class="flex justify-center text-white text-xs">
                    <a href="../API/logout.php" class="my-auto"><i class="p-3 border-[1px] rounded-lg border-white fa-solid fa-right-from-bracket"></i></a>
                    <div id="infoAccount" class="hidden ml-3 my-auto text-xs w-max">
                        <div class="line-clamp-1 font-semibold text-sm"><?php echo $_SESSION['nama']; ?></div>
                        <div class="line-clamp-1"><?php echo $_SESSION['nip']; ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>