let vlees = document.getElementById('vlees');

if(vlees.value >= vlees.max) {
    vlees.classList.add('foodCard__progress--max')
}
else if(vlees.value > vlees.max) {
    vlees.classList.add('foodCard__progress--tooMuch')
}

function checkProgression(id) {
    let element = document.getElementById(id);

    if(element.value >= element.max) {
        element.classList.add('foodCard__progress--max')
    }
}

checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');
checkProgression('peulvruchten');

