const arrows = {
    37: "left",
    38: "up",
    39: "right",
    40: "down",
};
function alertMessage(arrow) {
    alert(`You press ${arrow} arrow`)
}
$(document).keydown((e) => {
    for (let key of Object.keys(arrows)) {
        if (e.keyCode == key) {
            alertMessage(arrows[key]);
            break;
        }
    }
})