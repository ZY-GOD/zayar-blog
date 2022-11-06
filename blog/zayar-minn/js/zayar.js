let bars = document.querySelector("#bar");
let family = document.querySelector(".family");
bars.onclick = function () {
    bars.classList.toggle("fa-times");
    family.classList.toggle("show");
};