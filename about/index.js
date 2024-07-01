window.onload = function() {
    const images = [
        'url("../Media/Background.jpg")',
        'url("../Media/Background2.jpg")'
    ];

    let currentIndex = 0;

    // Seleciona o body
    const Hero = document.querySelector('.hero');

    // Função para mudar a imagem de fundo
    function changeBackgroundImage() {
        currentIndex = (currentIndex + 1) % images.length;
        Hero.style.backgroundImage = images[currentIndex];
    }

    // Muda a imagem de fundo a cada 10 segundos
    setInterval(changeBackgroundImage, 10000);
}