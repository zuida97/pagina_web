var indicefotos = 0;


mostrarFotos(indicefotos)

function mostrarFotos(indice){
  // querySelectorAll('.clase') llama a todos los elementos en el documento que tengan el nombre de la clase ''
  var fotos = document.querySelectorAll('.slide'),
      puntos = document.querySelectorAll('.puntos_de_navegacion');
  if (indice >= fotos.length) indicefotos = 0;
  if (indice < 0) indicefotos = fotos.length - 1;

  for (var i = 0; i < fotos.length; i++) {
      fotos[i].style.display = 'none';
      puntos[i].classList.remove("punto_activo");
  }
  fotos[indicefotos].style.display = "block";
  puntos[indicefotos].classList.add("punto_activo");

}

document.querySelector("#previa").addEventListener('click', function () {
    mostrarFotos(--indicefotos);
})

document.querySelector("#siguiente").addEventListener('click', function () {
    mostrarFotos(++indicefotos);
})

document.querySelectorAll('.puntos_de_navegacion').forEach(function (elem) {
    elem.addEventListener('click', function () {
        // get index of the dot
        let nodes = Array.prototype.slice.call(this.parentElement.children),
            indicepuntos = nodes.indexOf(elem);

        // call the function for the index of clicked dot
        mostrarFotos(indicefotos = indicepuntos)
    })
})

// setInterval(function(){mostrarFotos(++indicefotos)}, 3000);
