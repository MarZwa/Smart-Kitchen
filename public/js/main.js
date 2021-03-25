const menu_icon = document.getElementsByClassName("dashboard__menu__icon");
const dashboard_menu = document.getElementsByClassName("dashboard__menu");

function changeIcon() {
    menu_icon[0].classList.toggle("change");
    dashboard_menu[0].classList.toggle("visible");
    }