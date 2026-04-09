document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    form.addEventListener("submit", () => {
        console.log("Tentando cadastrar usuário...");
    });

    // Tradução dinâmica
    document.getElementById('idioma').addEventListener('change', (e) => {
        const idioma = e.target.value;
        if (idioma === 'en') {
            document.querySelector('.cadastro-container h2').textContent = "Register at Bella+";
            document.querySelector('label[for="nome"]').textContent = "Name:";
            document.querySelector('label[for="email"]').textContent = "Email:";
            document.querySelector('label[for="senha"]').textContent = "Password:";
            document.querySelector('.btn-vermelho').textContent = "Register";
            document.querySelector('.cadastro-container p a').textContent = "Already have an account? Sign in";
            document.querySelector('.sobre h2').textContent = "What is Bella+";
        } else if (idioma === 'es') {
            document.querySelector('.cadastro-container h2').textContent = "Registrarse en Bella+";
            document.querySelector('label[for="nome"]').textContent = "Nombre:";
            document.querySelector('label[for="email"]').textContent = "Correo electrónico:";
            document.querySelector('label[for="senha"]').textContent = "Contraseña:";
            document.querySelector('.btn-vermelho').textContent = "Registrar";
            document.querySelector('.cadastro-container p a').textContent = "¿Ya tienes cuenta? Iniciar sesión";
            document.querySelector('.sobre h2').textContent = "Qué es Bella+";
        } else {
            document.querySelector('.cadastro-container h2').textContent = "Cadastrar na Bella+";
            document.querySelector('label[for="nome"]').textContent = "Nome:";
            document.querySelector('label[for="email"]').textContent = "E-mail:";
            document.querySelector('label[for="senha"]').textContent = "Senha:";
            document.querySelector('.btn-vermelho').textContent = "Cadastrar";
            document.querySelector('.cadastro-container p a').textContent = "Já tem conta? Entrar";
            document.querySelector('.sobre h2').textContent = "O que é a Bella+";
        }
    });
});
