// Bar Open And Close Navbar Left
document.getElementById("bar").addEventListener("click", () => {
    var navbarLeftDashboard = document.getElementById("navbarLeftDashboard")
    var infoAccount = document.getElementById("infoAccount")
    var shortDashboard = document.getElementById("shortDashboard")
    var longDashboard = document.getElementById("longDashboard")

    longDashboard.classList.toggle("flex")
    longDashboard.classList.toggle("hidden")

    shortDashboard.classList.toggle("flex")
    shortDashboard.classList.toggle("hidden")

    infoAccount.classList.toggle("block")
    infoAccount.classList.toggle("hidden")

    navbarLeftDashboard.classList.toggle("w-20");
    navbarLeftDashboard.classList.toggle("w-[20rem]");
});


// Navbar Left Short Dashboard
function openLongDashboard() {
    var navbarLeftDashboard = document.getElementById("navbarLeftDashboard")
    var infoAccount = document.getElementById("infoAccount")
    var shortDashboard = document.getElementById("shortDashboard")
    var longDashboard = document.getElementById("longDashboard")

    longDashboard.classList.toggle("flex")
    longDashboard.classList.toggle("hidden")

    infoAccount.classList.toggle("block")
    infoAccount.classList.toggle("hidden")

    shortDashboard.classList.toggle("flex")
    shortDashboard.classList.toggle("hidden")

    navbarLeftDashboard.classList.toggle("w-20");
    navbarLeftDashboard.classList.toggle("w-[20rem]");
}


// Menu Long Dashboard
document.getElementById("menuWilayah").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuWilayah")
    var arrow = document.getElementById("arrowWilayah");

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuOrganisasi").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuOrganisasi")
    var arrow = document.getElementById("arrowOrganisasi")

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuKaryawan").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuKaryawan")
    var arrow = document.getElementById("arrowKaryawan")

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuManajemenAdmin").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuManajemenAdmin")
    var arrow = document.getElementById("arrowManajemenAdmin")

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuManajemenKaryawan").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuManajemenKaryawan")
    var arrow = document.getElementById("arrowManajemenKaryawan")

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuArsip").addEventListener("click", () => {
    var subMenu = document.getElementById("subMenuArsip")
    var arrow = document.getElementById("arrowArsip")

    arrow.classList.toggle("rotate-0")
    arrow.classList.toggle("rotate-180")

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});