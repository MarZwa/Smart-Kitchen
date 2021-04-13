const menu_icon = document.getElementsByClassName("dashboard__menu-icon")[0];
const dashboard_profile = document.getElementsByClassName("dashboard__profile")[0];
const html = document.getElementsByTagName('html')[0];

function changeIcon() {
    menu_icon.classList.toggle("change");
    dashboard_profile.classList.toggle("visible");
    html.classList.toggle('no-scroll');
}

// Custom HTMLElement for Circular progression bar
class CircularProgressionBar extends HTMLElement {
constructor() {
    super();
    const stroke = this.getAttribute('stroke');
    const radius = this.getAttribute('radius');
    const color = this.getAttribute('color');
    const normalizedRadius = radius - stroke * 2;
    this._circumference = normalizedRadius * 2 * Math.PI;

    this._root = this.attachShadow({mode: 'open'});
    this._root.innerHTML = 
    `<svg
        height="${radius * 2}"
        width="${radius * 2}"
        >
        <circle
            stroke="${color}"
            stroke-dasharray="${this._circumference} ${this._circumference}"
            style="stroke-dashoffset:${this._circumference}"
            stroke-width="${stroke}"
            fill="transparent"
            r="${normalizedRadius}"
            cx="${radius}"
            cy="${radius}"
        />
    </svg>

    <style>
        circle {
        transition: stroke-dashoffset 0.35s;
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
        }
    </style>`;


    let curVal = this.getAttribute('curVal');
    let maxVal = this.getAttribute('maxVal');
    const circle = this._root.querySelector('circle');
    
    if(100 < ((curVal / maxVal) * 100)){
        circle.style.stroke = "#F05454";
        curVal = maxVal;
    }

    const offset = this._circumference - (curVal / maxVal * this._circumference);
    circle.style.strokeDashoffset = offset;
}
}

window.customElements.define('circular-progression-bar', CircularProgressionBar);