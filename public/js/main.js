function togglePassword(el) {
    const input = document.querySelector('.pass');
    const eyeOn = document.querySelector('.eye-on');
    const eyeOff = document.querySelector('.eye-off');

    const isPas = document.getElementById('pas');

    if (input.type === "password") {
        if (isPas) {
            document.querySelector('.pas').type = "text";
        }
        input.type = "text";
        eyeOn.classList.remove("hidden");
        eyeOff.classList.add("hidden");
    } else {
        if (isPas) {
            document.querySelector('.pas').type = "password";
        }
        input.type = "password";
        eyeOn.classList.add("hidden");
        eyeOff.classList.remove("hidden");
    }
}
