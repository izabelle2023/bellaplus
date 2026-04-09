// Botão de tradução dinâmica no login
document.getElementById('idioma').addEventListener('change', (e) => {
    const idioma = e.target.value;

    if (idioma === 'en') {
        document.querySelector('.login-container h2').textContent = "Sign in to Bella+";
        document.querySelector('label[for="usuario"]').textContent = "Username:";
        document.querySelector('label[for="senha"]').textContent = "Password:";
        document.querySelector('.btn-vermelho').textContent = "Sign in";
        document.querySelector('.login-container p a').textContent = "Back to Home";
        document.querySelector('.sobre h2').textContent = "What is Bella+";
        document.querySelector('.sobre p').textContent = "Bella+ is an innovative streaming platform offering movies, series and technology content...";
    } else if (idioma === 'es') {
        document.querySelector('.login-container h2').textContent = "Iniciar sesión en Bella+";
        document.querySelector('label[for="usuario"]').textContent = "Usuario:";
        document.querySelector('label[for="senha"]').textContent = "Contraseña:";
        document.querySelector('.btn-vermelho').textContent = "Entrar";
        document.querySelector('.login-container p a').textContent = "Volver a Inicio";
        document.querySelector('.sobre h2').textContent = "Qué es Bella+";
        document.querySelector('.sobre p').textContent = "Bella+ es una plataforma de streaming innovadora que ofrece películas, series y contenidos de tecnología...";
    } else {
        document.querySelector('.login-container h2').textContent = "Entrar na Bella+";
        document.querySelector('label[for="usuario"]').textContent = "Usuário:";
        document.querySelector('label[for="senha"]').textContent = "Senha:";
        document.querySelector('.btn-vermelho').textContent = "Entrar";
        document.querySelector('.login-container p a').textContent = "Voltar para Home";
        document.querySelector('.sobre h2').textContent = "O que é a Bella+";
        document.querySelector('.sobre p').textContent = "A Bella+ é uma plataforma de streaming inovadora que oferece filmes, séries e conteúdos relacionados à tecnologia...";
    }
});

// Feedback no formulário de login
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    form.addEventListener("submit", () => {
        console.log("Tentando login...");
    });
});
