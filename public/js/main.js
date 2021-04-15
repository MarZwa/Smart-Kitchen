const navigation_icon = document.getElementsByClassName("navigation-icon")[0];
const navigation = document.getElementsByClassName("navigation__menu")[0];
const dashboard_navigation = document.getElementsByClassName("dashboard-navigation__profile")[0];
const html = document.getElementsByTagName('html')[0];

function changeIcon() {
    navigation_icon.classList.toggle("change");
    navigation.classList.toggle("visible");
    html.classList.toggle('no-scroll');
}

function changeIconDashboard() {
    navigation_icon.classList.toggle("change");
    dashboard_navigation.classList.toggle("visible");
    html.classList.toggle('no-scroll');
}