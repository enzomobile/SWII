document.addEventListener("DOMContentLoaded", function () {
    // Armazena os elementos do form para serem tratados:

    const form = document.getElementById("formLogin");
    const emailInput = document.getElementById("email");
    const senhaInput = document.getElementById("senha");

    const emailMsg = document.getElementById("emailMsg");
    const senhaMsg = document.getElementById("senhaMsg");

    // Máscara para e-mail e senha.

    emailInput.addEventListener("input", function () {
        emailInput.value = emailInput.value.replace(/\s/g, "");
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(emailInput.value)) {
            emailMsg.textContent = "Formato de e-mail inválido.";
            emailMsg.style.color = "red";
        } else {
            emailMsg.textContent = "";
        }
    });

    senhaInput.addEventListener("input", function () {
        senhaInput.value = senhaInput.value.replace(/\s/g, "");
        if (senhaInput.value.length > 0) {
            senhaMsg.textContent = "";
        }
    });

    // Previne dados incompletos/falhos ao enviar o form.

    form.addEventListener("submit", function (e) {
        const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        const senhaValida = senhaInput.value.trim() !== "" && !/\s/.test(senhaInput.value);

        if (!emailValido || !senhaValida) {
            e.preventDefault();
            if (!emailValido) {
                emailMsg.textContent = "Por favor, insira um e-mail válido.";
                emailMsg.style.color = "red";
            }
            if (!senhaValida) {
                senhaMsg.textContent = "A senha não pode estar vazia ou conter espaços.";
                senhaMsg.style.color = "red";
            }
        }
    });
});