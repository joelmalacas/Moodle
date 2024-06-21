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

function Documentos() {
    const DocumentoFiscal = document.getElementById('transporte');

    const idnumberLabel = document.getElementById('idnumberLabel');
    const idexpiryLabel = document.getElementById('idexpiryLabel');

    if (DocumentoFiscal.value == 'CC') {
        idnumberLabel.textContent = 'Número Cartão de Cidadão';
        idexpiryLabel.textContent = 'Data Validade do Cartão Cidadão';
    } else if (DocumentoFiscal.value == 'Passaporte') {
        idnumberLabel.textContent = 'Número Passaporte';
        idexpiryLabel.textContent = 'Data Validade do Passaporte';
    }
}


function CriaElementos() {
    const employee = document.getElementById("employee");
    const form = document.querySelector(".RegistoMoodle");


    if (employee.value === "yes") {
        const EmpresaLabel = document.createElement("label");
        const EmpresaInput = document.createElement("input");
        EmpresaLabel.textContent = 'Nome da Empresa';
        EmpresaInput.setAttribute('type', 'text');
        EmpresaInput.setAttribute('name', 'employer');

        form.appendChild(EmpresaLabel);
        form.appendChild(EmpresaInput);
    }

    // Criar botão "Registar"
    const button = document.createElement('button');
    button.setAttribute('type', 'submit');
    button.setAttribute('name', 'Registar');
    button.setAttribute('id', 'Registar');
    button.textContent = 'Registar';

    // Adicionar botão ao formulário
    form.appendChild(button);
}