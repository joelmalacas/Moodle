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
    const form = document.querySelector('form');

    // Remover elementos existentes se houver
    const existingDiv = form.querySelector('.form-group');
    const existingButton = form.querySelector('button[type="submit"]');

    if (existingDiv) {
        form.removeChild(existingDiv);
    }

    if (existingButton) {
        form.removeChild(existingButton);
    }

    // Verificar o valor selecionado em "employee"
    if (employee.value === "yes") {
        // Criar div.form-group
        const divFormGroup = document.createElement('div');
        divFormGroup.classList.add('form-group');

        // Criar label
        const label = document.createElement('label');
        label.setAttribute('for', 'employer');
        label.textContent = 'Nome Empresa';

        // Criar input
        const input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('id', 'employer');
        input.setAttribute('name', 'employer');
        input.setAttribute('required', '');

        // Adicionar label e input a div.form-group
        divFormGroup.appendChild(label);
        divFormGroup.appendChild(input);

        // Criar botão "Registar"
        const button = document.createElement('button');
        button.setAttribute('type', 'submit');
        button.textContent = 'Registar';

        // Adicionar div.form-group e botão ao formulário
        form.appendChild(divFormGroup);
        form.appendChild(button);
    } else if (employee.value === "no" || employee.value === "") {
        // Criar botão "Registar" apenas
        const button = document.createElement('button');
        button.setAttribute('type', 'submit');
        button.textContent = 'Registar';

        // Adicionar botão ao formulário
        form.appendChild(button);
    }
}