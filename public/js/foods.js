function checkProgression(id) {
    let element = document.getElementById(id);

    if(element.value >= element.max) {
        element.classList.add('foodCard__progress--max');
    }
}

checkProgression('groente');
checkProgression('fruit');
checkProgression('brood');
checkProgression('aardappelen');
checkProgression('vis');
checkProgression('peulvruchten');
checkProgression('ei');
checkProgression('noten');
checkProgression('melk');
checkProgression('kaas');
checkProgression('vetten');