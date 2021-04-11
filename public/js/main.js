const menu_icon = document.getElementsByClassName("dashboard__menu-icon")[0];
const dashboard_profile = document.getElementsByClassName("dashboard__profile")[0];
const html = document.getElementsByTagName('html')[0];

function changeIcon() {
    menu_icon.classList.toggle("change");
    dashboard_profile.classList.toggle("visible");
    html.classList.toggle('no-scroll');
}