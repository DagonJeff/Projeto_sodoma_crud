function solicitarEmail() {
    var email = document.getElementById("emailInput").value;

    if (email !== null && email !== "") {
        alert("Obrigado! Boas compras.");
        fecharOverlay();
    } else {
        alert("Por favor, insira um e-mail válido.");
    }
}

function abrirOverlay() {
    document.getElementById("overlay").style.display = "flex";
}

function fecharOverlay() {
    document.getElementById("overlay").style.display = "none";
}


window.onload = abrirOverlay;
