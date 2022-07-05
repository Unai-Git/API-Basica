//Cargar datos
window.onload = function () {
  todosLosDatos();
};

//Globales
const btn = document.querySelector("#mostrar");
const buscar = document.querySelector("#buscar");
const eliminar = document.querySelector("#eliminar");
const actualizar = document.querySelector("#actualizar");
const crear = document.querySelector("#crear");
const lista = document.querySelector("#personajes");

//Mostrar/Ocultar div con los datos
btn.addEventListener("click", function () {
  if (lista.style.display == "none") {
    lista.style.display = "block";
  } else {
    lista.style.display = "none";
  }
});

//Crear lista para insertar los datos
function crearLista(datos) {
  for (let index = 0; index < datos.length; index++) {
    let ul = document.createElement("ul");
    let li1 = document.createElement("li");
    let li2 = document.createElement("li");
    let li3 = document.createElement("li");
    let li4 = document.createElement("li");
    let li5 = document.createElement("li");
    let li6 = document.createElement("li");
    let li7 = document.createElement("li");

    li1.innerHTML = datos[index].nombre;
    li2.innerHTML = datos[index].apellido;
    li3.innerHTML = datos[index].alias;
    li4.innerHTML = datos[index].nacimiento;
    li5.innerHTML = datos[index].estado;
    li6.innerHTML = datos[index].info;
    li7.innerHTML = datos[index].id;

    ul.appendChild(li7);
    ul.appendChild(li1);
    ul.appendChild(li2);
    ul.appendChild(li3);
    ul.appendChild(li4);
    ul.appendChild(li5);
    ul.appendChild(li6);

    lista.appendChild(ul);
  }
}

// *API
//!Mostrar todos los datos
function todosLosDatos() {
  let url = "http://localhost/api_final/PHP/personajes.php";

  fetch(url)
    .then((response) => response.json()) //Transformar respuesta a JSON
    .then((data) => {
      //console.log(data);
      crearLista(data);
    })
    .catch((err) => console.log(err));
}

//!Buscar por id
buscar.addEventListener("click", function () {
  let url = "http://localhost/api_final/PHP/personajes.php";
  let formato = "?id=";
  let parametro = document.querySelector("#id_buscar").value;

  fetch(url + formato + parametro)
    .then((response) => response.json()) //Transformar respuesta a JSON
    .then((data) => {
      if (data.id == parametro) {
        document.querySelector(
          "#personaje"
        ).innerHTML = `<span style="color:green;">Datos del personaje con id(${parametro})</span>
      
        -> <b>Personaje:</b> ${data.nombre} ${data.apellido}
        -> <b>Alias:</b> ${data.alias} 
        -> <b>Actor:</b> ${data.info} 
        `;
      } else {
        document.querySelector(
          "#personaje"
        ).innerHTML = `<span style="color:red;">El id insertado no existe</span>`;
      }
    })
    .catch((err) => console.log(err));
});

//!Eliminar por id
eliminar.addEventListener("click", function () {
  let url = "http://localhost/api_final/PHP/personajes.php";
  let formato = "?id=";
  let parametro = document.querySelector("#id_eliminar").value;

  fetch(url + formato + parametro, { method: "DELETE" })
    .then(
      () =>
        (document.querySelector(
          "#feedback"
        ).innerHTML = `<span style="color:green;">Eliminado los datos del personaje con id(${parametro})</span>`)
    )
    .catch((err) => console.log(err));
});
