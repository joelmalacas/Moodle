window.onload = function() {
    const Principal = document.getElementById("Pprincipal"),
        Perfil = document.getElementById("Perfil"),
        Disciplina = document.getElementById("Disciplina");

    Principal.addEventListener("click", function() {
        Principal.classList.add("active");
        Perfil.classList.remove("active");
        Disciplina.classList.remove("active");
    });

    Perfil.addEventListener("click", function() {
        Perfil.classList.add("active");
        Principal.classList.remove("active");
        Disciplina.classList.remove("active");
    });

    Disciplina.addEventListener("click", function() {
        Disciplina.classList.add("active");
        Principal.classList.remove("active");
        Perfil.classList.remove("active");
    });
}