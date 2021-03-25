const invoerAfval = document.getElementById("js--invoerAfval");

function getInvoer(afval) {
    let invoer = invoerAfval.value.toLowerCase();
    console.log(invoer);
    for (i = 0; i < afval.length; i++) {
        if (invoer == afval[i].naam) {
            invoerAfval.value = "";
            window.location.replace("/status/" + invoer);
        }
    }
    invoerAfval.value = "";
}