window.onload = function() {

    //Id clicks => fica em active
    const Alunos = document.getElementById('Alunos'),
        Inscricoes = document.getElementById('Inscricoes'),
        CriaCurso = document.getElementById('CriaCurso'),
        CriaDisciplina = document.getElementById('CriaDisciplina'),
        EditCurso = document.getElementById('EditCurso'),
        EditDisciplina = document.getElementById('EditDisciplina'),
        RemCurso = document.getElementById('RemCurso'),
        RemDisciplina = document.getElementById('RemDisciplina');

    Alunos.onclick = function() {
        Alunos.classList.add('active');
        Inscricoes.classList.remove('active');
        CriaCurso.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        EditCurso.classList.remove('active');
        EditDisciplina.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    Inscricoes.onclick = function() {
        Inscricoes.classList.add('active');
        Alunos.classList.remove('active');
        CriaCurso.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        EditCurso.classList.remove('active');
        EditDisciplina.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    CriaCurso.onclick = function() {
        CriaCurso.classList.add('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        EditCurso.classList.remove('active');
        EditDisciplina.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    CriaDisciplina.onclick = function() {
        CriaDisciplina.classList.add('active');
        CriaCurso.classList.remove('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        EditCurso.classList.remove('active');
        EditDisciplina.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    EditCurso.onclick = function() {
        EditCurso.classList.add('active');
        CriaDisciplina.classList.remove('active');
        CriaCurso.classList.remove('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        EditDisciplina.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    EditDisciplina.onclick = function() {
        EditDisciplina.classList.add('active');
        EditCurso.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        CriaCurso.classList.remove('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        RemCurso.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    RemCurso.onclick = function() {
        RemCurso.classList.add('active');
        EditDisciplina.classList.remove('active');
        EditCurso.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        CriaCurso.classList.remove('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        RemDisciplina.classList.remove('active');
    }

    RemDisciplina.onclick = function() {
        RemDisciplina.classList.add('active');
        EditDisciplina.classList.remove('active');
        EditCurso.classList.remove('active');
        CriaDisciplina.classList.remove('active');
        CriaCurso.classList.remove('active');
        Inscricoes.classList.remove('active');
        Alunos.classList.remove('active');
        RemCurso.classList.remove('active');
    }

}