// Traduções
const traducoes = {
  pt: {
    filmes: "TOP FILMES",
    series: "SÉRIES POPULARES",
    sobreTitulo: "O que é a Bella+",
    sobreTexto: "A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos relacionados à tecnologia. Nosso foco é proporcionar aos usuários uma experiência personalizada, acessível a qualquer hora e em qualquer dispositivo, reunindo entretenimento de qualidade e informações tecnológicas em um só lugar.",
    footer: "© 2026 BELLA+ - DESENVOLVIDO POR IZABELLE SILVA",
    btnComecar: "Começar agora",
    btnSaiba: "Saiba mais",
    btnEntrar: "Entrar",
    btnPerfil: "Perfil",
    bannerTitulo: "Filmes, séries e tecnologia em um só lugar",
    bannerSubtitulo: "Assista conteúdos exclusivos da Bella+ quando quiser."
  },
  en: {
    filmes: "TOP MOVIES",
    series: "POPULAR SERIES",
    sobreTitulo: "What is Bella+",
    sobreTexto: "Bella+ is an innovative streaming platform offering a wide selection of movies, series, and technology-related content. Our focus is to provide users with a personalized experience, accessible anytime and on any device, combining quality entertainment and tech insights in one place.",
    footer: "© 2026 BELLA+ - DEVELOPED BY IZABELLE SILVA",
    btnComecar: "Start now",
    btnSaiba: "Learn more",
    btnEntrar: "Login",
    btnPerfil: "Profile",
    bannerTitulo: "Movies, series and technology in one place",
    bannerSubtitulo: "Watch exclusive Bella+ content anytime."
  },
  es: {
    filmes: "PELÍCULAS DESTACADAS",
    series: "SERIES POPULARES",
    sobreTitulo: "¿Qué es Bella+?",
    sobreTexto: "Bella+ es una plataforma de streaming innovadora que ofrece una amplia selección de películas, series y contenidos relacionados con la tecnología. Nuestro objetivo es brindar a los usuarios una experiencia personalizada, accesible en cualquier momento y en cualquier dispositivo, reuniendo entretenimiento de calidad e información tecnológica en un solo lugar.",
    footer: "© 2026 BELLA+ - DESARROLLADO POR IZABELLE SILVA",
    btnComecar: "Comenzar ahora",
    btnSaiba: "Saber más",
    btnEntrar: "Entrar",
    btnPerfil: "Perfil",
    bannerTitulo: "Películas, series y tecnología en un solo lugar",
    bannerSubtitulo: "Mira contenido exclusivo de Bella+ cuando quieras."
  }
};

// Função para trocar idioma
document.getElementById("idioma").addEventListener("change", e => {
  const lang = e.target.value;
  const t = traducoes[lang];

  // Títulos
  document.getElementById("filmesTitulo").textContent = t.filmes;
  document.getElementById("seriesTitulo").textContent = t.series;
  document.getElementById("sobreTitulo").textContent = t.sobreTitulo;
  document.getElementById("sobreTexto").textContent = t.sobreTexto;
  document.getElementById("rodape").textContent = t.footer;

  // Banner
  document.getElementById("titulo").textContent = t.bannerTitulo;
  document.getElementById("subtitulo").textContent = t.bannerSubtitulo;

  // Botões
  document.querySelector(".btn-vermelho").textContent = t.btnComecar;
  document.getElementById("saiba").textContent = t.btnSaiba;

  const btnEntrar = document.querySelector(".btn-entrar");
  if (btnEntrar) {
    if (btnEntrar.textContent.trim().toLowerCase() === "perfil" || btnEntrar.textContent.trim().toLowerCase() === "profile") {
      btnEntrar.textContent = t.btnPerfil;
    } else {
      btnEntrar.textContent = t.btnEntrar;
    }
  }
});

// Carrossel
document.querySelectorAll(".arrow").forEach(btn => {
  btn.addEventListener("click", () => {
    const targetId = btn.getAttribute("data-target");
    const container = document.getElementById(targetId);
    const scrollAmount = 300;
    if (btn.classList.contains("left")) {
      container.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    } else {
      container.scrollBy({ left: scrollAmount, behavior: "smooth" });
    }
  });
});

// Modal de vídeo
const modal = document.getElementById("videoModal");
const modalVideo = document.getElementById("modalVideo");
const closeBtn = document.querySelector(".close");

document.querySelectorAll(".video-card").forEach(card => {
  card.addEventListener("click", () => {
    const videoId = card.getAttribute("data-video");
    modal.style.display = "flex";
    modalVideo.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
  });
});

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
  modalVideo.src = "";
});

window.addEventListener("click", e => {
  if (e.target === modal) {
    modal.style.display = "none";
    modalVideo.src = "";
  }
});

// Botão "Saiba mais"
document.getElementById("saiba").addEventListener("click", () => {
  document.getElementById("sobre").scrollIntoView({ behavior: "smooth" });
});
