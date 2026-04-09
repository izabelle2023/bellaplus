// Carrossel
document.querySelectorAll('.arrow').forEach(arrow => {
    arrow.addEventListener('click', () => {
        const targetId = arrow.getAttribute('data-target');
        const container = document.getElementById(targetId);
        const scrollAmount = arrow.classList.contains('left') ? -300 : 300;
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
});

// Modal de vídeo com verificação de login
const modal = document.getElementById('videoModal');
const modalVideo = document.getElementById('modalVideo');
const closeBtn = document.querySelector('.close');

function abrirModal(videoId) {
    if (!usuarioLogado) {
        window.location.href = "pags/login.php";
        return;
    }
    modal.style.display = 'flex';
    modalVideo.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
}

function fecharModal() {
    modal.style.display = 'none';
    modalVideo.src = '';
}

closeBtn.addEventListener('click', fecharModal);
window.addEventListener('click', (e) => { if (e.target === modal) fecharModal(); });

// Botão "Saiba mais"
document.getElementById('saiba').addEventListener('click', () => {
    document.getElementById('sobre').scrollIntoView({ behavior: 'smooth' });
});

// Tradução dinâmica
document.getElementById('idioma').addEventListener('change', (e) => {
    const idioma = e.target.value;
    if (idioma === 'en') {
        document.getElementById('titulo').textContent = "Movies, series and technology in one place";
        document.getElementById('subtitulo').textContent = "Watch exclusive Bella+ content anytime.";
        document.querySelector('.btn-vermelho').textContent = "Start now";
        document.getElementById('saiba').textContent = "Learn more";
        document.querySelector('.btn-entrar').textContent = usuarioLogado ? "Profile" : "Sign in";
        document.querySelector('.sobre h2').textContent = "What is Bella+";
        document.querySelector('.sobre p').textContent = "Bella+ is an innovative streaming platform offering a wide selection of movies, series, and technology-related content...";
    } else if (idioma === 'es') {
        document.getElementById('titulo').textContent = "Películas, series y tecnología en un solo lugar";
        document.getElementById('subtitulo').textContent = "Mira contenido exclusivo de Bella+ cuando quieras.";
        document.querySelector('.btn-vermelho').textContent = "Comenzar ahora";
        document.getElementById('saiba').textContent = "Saber más";
        document.querySelector('.btn-entrar').textContent = usuarioLogado ? "Perfil" : "Entrar";
        document.querySelector('.sobre h2').textContent = "Qué es Bella+";
        document.querySelector('.sobre p').textContent = "Bella+ es una plataforma de streaming innovadora que ofrece una amplia selección de películas, series y contenidos relacionados con la tecnología...";
    } else {
        document.getElementById('titulo').textContent = "Filmes, séries e tecnologia em um só lugar";
        document.getElementById('subtitulo').textContent = "Assista conteúdos exclusivos da Bella+ quando quiser.";
        document.querySelector('.btn-vermelho').textContent = "Começar agora";
        document.getElementById('saiba').textContent = "Saiba mais";
        document.querySelector('.btn-entrar').textContent = usuarioLogado ? "Perfil" : "Entrar";
        document.querySelector('.sobre h2').textContent = "O que é a Bella+";
        document.querySelector('.sobre p').textContent = "A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos relacionados à tecnologia...";
    }
});

// Renderização dinâmica
function renderVideos(lista, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = "";
    lista.forEach((item, index) => {
        const card = document.createElement("div");
        card.classList.add("video-card");
        card.setAttribute("data-video", item.videoId);
        card.innerHTML = `
            <span class="numero">${index + 1}</span>
            <img src="https://img.youtube.com/vi/${item.videoId}/hqdefault.jpg" alt="${item.titulo} Trailer" />
        `;
        container.appendChild(card);
        card.addEventListener('click', () => abrirModal(item.videoId));
    });
}

// Carregar dados do PHP
async function carregarDados() {
    try {
        const filmes = await fetch('api/filmes.php').then(res => res.json());
        const series = await fetch('api/series.php').then(res => res.json());
        renderVideos(filmes, "top-filmes");
        renderVideos(series, "series");
    } catch (error) {
        console.error("Erro ao carregar dados:", error);
    }
}
carregarDados();
