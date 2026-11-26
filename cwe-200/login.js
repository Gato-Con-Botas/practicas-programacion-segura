// Variables
let form = document.querySelector('form');
let email = document.querySelector('#email');
let msg = document.querySelector('.text-danger');
let submit = document.querySelector('#submit');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    [email, submit].forEach(elemento => {
        elemento.setAttribute("disabled", "");
    });

    if (!email.value.endsWith('@uv.mx')) {
        msg.classList.remove('d-none');
        [email, submit].forEach(elemento => {
            elemento.removeAttribute("disabled");
        });
        return;
    }

    fetch("https://correocode.azurewebsites.net/correo", {
        method: "POST",
        body: JSON.stringify({
            correo: email.value,
        }),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
    }).then(json => {
        [email, submit].forEach(elemento => {
            elemento.removeAttribute("disabled");
        });
        document.location = 'codigo.php';
    });
});