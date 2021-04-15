let groente = document.getElementById('groente');
let fruit = document.getElementById('fruit');
let brood = document.getElementById('brood');
let aardappelen = document.getElementById('aardappelen');
let vis = document.getElementById('vis');
let peulvruchten = document.getElementById('peulvruchten');
let vlees = document.getElementById('vlees');
let ei = document.getElementById('ei');
let noten = document.getElementById('noten');
let melk = document.getElementById('melk');
let kaas = document.getElementById('kaas');
let vetten = document.getElementById('vetten');

var foods = [groente, fruit, brood, aardappelen, vis, peulvruchten, vlees, ei, noten, melk, kaas, vetten]

function checkDone(foodId) {
    if(foodId.value == foodId.max) {
        foodId.classList.add('foodCard__progress--done');
    }
}

for(i=0; i<foods.length; i++) {
    checkDone(foods[i]);
}
