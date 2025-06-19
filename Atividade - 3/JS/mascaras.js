document.addEventListener("DOMContentLoaded", function () {
    
    //Máscara para telefone e CPF.
    const telefoneInput = document.getElementById("telefone");
    const cpfInput = document.getElementById("cpf");
    telefoneInput.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");
        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
        valor = valor.replace(/(\d{5})(\d)/, "$1-$2");
        valor = valor.slice(0, 15);
        e.target.value = valor;
    })

    cpfInput.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");
        valor = valor.slice(0, 11);
        e.target.value = valor;
    })

    // Máscara para e-mail.
    const emailInput = document.getElementById("email");
    const emailMsg = document.getElementById("emailMsg");
    emailInput.addEventListener("input", function () {
        const valor = emailInput.value;
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        if (!regex.test(valor)) {
            emailMsg.textContent = "Formato de e-mail inválido.";
            emailMsg.style.color = "red";
        } else {
            emailMsg.textContent = "";
        }
    });
});