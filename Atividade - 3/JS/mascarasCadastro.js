document.addEventListener("DOMContentLoaded", function () {
    
    // Armazena os elementos do form para serem tratados:

    const form = document.getElementById("formCadastro");
    const telefoneInput = document.getElementById("telefone");
    const cpfInput = document.getElementById("cpf");
    const emailInput = document.getElementById("email");
    const senhaInput = document.getElementById("senha");

    const emailMsg = document.getElementById("emailMsg");
    const telefoneMsg = document.getElementById("telefoneMsg");
    const cpfMsg = document.getElementById("cpfMsg");
    const senhaMsg = document.getElementById("senhaMsg");

    //Máscara para telefone e CPF.
    
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
        const telefoneCompleto = telefoneInput.value.length === 15;
        const cpfCompleto = cpfInput.value.length === 11;
        const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        const senhaValida = senhaInput.value.trim() !== "" && !/\s/.test(senhaInput.value);

        if (!telefoneCompleto || !cpfCompleto || !emailValido || !senhaValida) {
            e.preventDefault();

            if (!telefoneCompleto) {
                telefoneMsg.textContent = "Telefone incompleto. Ex: (11) 90000-4321";
                telefoneMsg.style.color = "red";
            }

            if (!cpfCompleto) {
                cpfMsg.textContent = "CPF incompleto. Insira os 11 números.";
                cpfMsg.style.color = "red";
            }

            if (!emailValido) {
                emailMsg.textContent = "Formato de e-mail inválido.";
                emailMsg.style.color = "red";
            }

            if (!senhaValida) {
                senhaMsg.textContent = "A senha não pode conter espaços nem estar vazia.";
                senhaMsg.style.color = "red";
            }

            alert("Por favor, preencha todos os campos corretamente.");
        }
    });
});