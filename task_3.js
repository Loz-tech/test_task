$(document).keydown((event) => {
    const key = event.keyCode;
    if (key >= 37 || key <= 40) {
        const arrow = event.key.toString().split('Arrow')[1].toLowerCase();
        alert(`You pressed ${arrow} arrow`);
    }
})
