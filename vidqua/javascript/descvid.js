const botonMostrarOcultar = document.getElementById('mostrarOcultar');
const texto = document.getElementById('texto');

botonMostrarOcultar.addEventListener('click', () => {
    if (texto.style.display === 'none' || texto.style.display === '') {
        texto.style.display = 'block';
        botonMostrarOcultar.innerHTML ="Ocultar descripcion";
    } else {
        botonMostrarOcultar.innerHTML ="Ver descripcion";
        texto.style.display = 'none';
    }
});
