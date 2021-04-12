const invoerAfval = document.getElementById("js--invoerAfval");
const dagInvoer = document.getElementById("js--dagInvoer");
const datumVeld__h1 = document.getElementById("js--datumVeld__h1");
const datumVeld = document.getElementById("js--datumVeld");

function getInvoer(afval) {
    let invoer = invoerAfval.value.toLowerCase();
    for (i = 0; i < afval.length; i++) {
        if (invoer == afval[i].naam) {
            invoerAfval.value = "";
            window.location.replace("/status/" + invoer);
        }
    }
    invoerAfval.value = "";
}

function setDag() {
    let invoerDag = dagInvoer.value.toLowerCase();
    window.location.replace("/set/" + invoerDag);
}

function getDay(ophaal_dag) {
    let date = new Date();
    let dag = date.getDay();
    switch (ophaal_dag) {
        case 'zondag':
            cijfer_ophaal_dag = 0;
            break;
        case 'maandag':
            cijfer_ophaal_dag = 1;
            break;
        case 'dinsdag':
            cijfer_ophaal_dag = 2;
            break;
        case 'woensdag':
            cijfer_ophaal_dag = 3;
            break;
        case 'donderdag':
            cijfer_ophaal_dag = 4;
            break;
        case 'vrijdag':
            cijfer_ophaal_dag = 5;
            break;
        case 'zaterdag':
            cijfer_ophaal_dag = 6;
            break;
        case '':
            cijfer_ophaal_dag = 1000;
            break;
    }
    verschil = cijfer_ophaal_dag - dag;
    if (verschil == 1 || verschil == -6) {
        datumVeld__h1.innerHTML = "Het vuilnis wordt morgen opgehaald";
        datumVeld.classList.add("u-back-yellow");
    }
    else if (verschil == 0) {
        datumVeld__h1.innerHTML = "Het vuilnis wordt vandaag opgehaald";
        datumVeld.classList.add("u-back-red");
    }
}