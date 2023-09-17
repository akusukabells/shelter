// Bar Open And Close Navbar Left
document.getElementById("bar").addEventListener("click", () => {
    const navbarLeftDashboard = document.getElementById("navbarLeftDashboard")
    const infoAccount = document.getElementById("infoAccount")
    const shortDashboard = document.getElementById("shortDashboard")
    const longDashboard = document.getElementById("longDashboard")

    longDashboard.classList.toggle("flex")
    longDashboard.classList.toggle("hidden")

    shortDashboard.classList.toggle("flex")
    shortDashboard.classList.toggle("hidden")

    infoAccount.classList.toggle("block")
    infoAccount.classList.toggle("hidden")

    navbarLeftDashboard.classList.toggle("w-20");
    navbarLeftDashboard.classList.toggle("w-96");
});


// Navbar Left Short Dashboard
function openLongDashboard() {
    const navbarLeftDashboard = document.getElementById("navbarLeftDashboard")
    const infoAccount = document.getElementById("infoAccount")
    const shortDashboard = document.getElementById("shortDashboard")
    const longDashboard = document.getElementById("longDashboard")

    longDashboard.classList.toggle("flex")
    longDashboard.classList.toggle("hidden")

    infoAccount.classList.toggle("block")
    infoAccount.classList.toggle("hidden")

    shortDashboard.classList.toggle("flex")
    shortDashboard.classList.toggle("hidden")

    navbarLeftDashboard.classList.toggle("w-20");
    navbarLeftDashboard.classList.toggle("w-96");
};


// Popup Form
function openPopupForm() {
    const popupForm = document.getElementById("popupForm");

    popupForm.classList.remove("hidden");
};

function closePopupForm() {
    const popupForm = document.getElementById("popupForm");

    popupForm.classList.add("hidden");
};


// Menu Long Dashboard
document.getElementById("menuWilayah").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuWilayah");
    const arrow = document.getElementById("arrowWilayah");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");
    
    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuOrganisasi").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuOrganisasi");
    const arrow = document.getElementById("arrowOrganisasi");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuKaryawan").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuKaryawan");
    const arrow = document.getElementById("arrowKaryawan");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuManajemenAdmin").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuManajemenAdmin");
    const arrow = document.getElementById("arrowManajemenAdmin");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuManajemenKaryawan").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuManajemenKaryawan");
    const arrow = document.getElementById("arrowManajemenKaryawan");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});

document.getElementById("menuArsip").addEventListener("click", () => {
    const subMenu = document.getElementById("subMenuArsip");
    const arrow = document.getElementById("arrowArsip");

    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-up");

    subMenu.classList.toggle("h-0");
    subMenu.classList.toggle("h-fit");
});