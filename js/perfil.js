document.addEventListener("DOMContentLoaded", () => {
    const idiomaSelect = document.getElementById("idioma");

    if (idiomaSelect) {
        idiomaSelect.addEventListener("change", (e) => {
            const idioma = e.target.value;

            const titulo = document.querySelector(".perfil-container h2");
            const btnHome = document.querySelector(".acoes a:first-child button");
            const btnLogoutPerfil = document.querySelector(".acoes a:last-child button");
            const btnLogoutHeader = document.querySelector(".btn-entrar");
            const rodape = document.querySelector("footer p");

            if (idioma === "en") {
                titulo.textContent = "My Profile";
                btnHome.textContent = "Home";
                btnLogoutPerfil.textContent = "Log out";
                btnLogoutHeader.textContent = "Log out";
                rodape.textContent = "© 2026 Bella+. All rights reserved.";
            } else if (idioma === "es") {
                titulo.textContent = "Mi Perfil";
                btnHome.textContent = "Inicio";
                btnLogoutPerfil.textContent = "Cerrar sesión";
                btnLogoutHeader.textContent = "Cerrar sesión";
                rodape.textContent = "© 2026 Bella+. Todos los derechos reservados.";
            } else {
                titulo.textContent = "Meu Perfil";
                btnHome.textContent = "Home";
                btnLogoutPerfil.textContent = "Sair da Conta";
                btnLogoutHeader.textContent = "Sair";
                rodape.textContent = "© 2026 Bella+. Todos os direitos reservados.";
            }
        });
    }
});



// Feedback visual ao clicar nos botões
const botoes = document.querySelectorAll(".btn-vermelho");
botoes.forEach(btn => {
    btn.addEventListener("click", () => {
        btn.style.opacity = "0.7";
        setTimeout(() => {
            btn.style.opacity = "1";
        }, 200);
        console.log("Botão clicado:", btn.textContent);
    });
});

// Efeito hover no avatar-letra
const avatar = document.querySelector(".avatar-letra");
if (avatar) {
    avatar.addEventListener("mouseover", () => {
        avatar.style.transform = "scale(1.15)";
        avatar.style.backgroundColor = "#555";
    });
    avatar.addEventListener("mouseout", () => {
        avatar.style.transform = "scale(1)";
        avatar.style.backgroundColor = "#333";
    });
};
