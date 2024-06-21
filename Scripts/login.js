window.onload = function() {
    // Array com o caminho das imagens de fundo
    const images = [
        'url("../Moodle/Media/Background.jpg")',
        'url("../Moodle/Media/Background2.jpg")'
    ];

    let currentIndex = 0;

    // Seleciona o body
    const body = document.body;

    // Função para mudar a imagem de fundo
    function changeBackgroundImage() {
        currentIndex = (currentIndex + 1) % images.length;
        body.style.backgroundImage = images[currentIndex];
    }

    // Muda a imagem de fundo a cada 10 segundos
    setInterval(changeBackgroundImage, 10000);
};