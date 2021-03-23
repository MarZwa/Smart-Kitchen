const invoerAfval = document.getElementById("js--invoerAfval");

function getInvoer() {
    let invoer = invoerAfval.value;
    invoerAfval.value = "";
    window.location.replace("/status/" + invoer);
}