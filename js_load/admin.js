// Seleccionamos elementos
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const toggleBtn = document.getElementById('toggleSidebar');

// Mostrar/ocultar sidebar al hacer clic en el botón hamburguesa
toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('show');   // Añade/quita clase para mostrar sidebar
  overlay.classList.toggle('show');   // Añade/quita overlay
});

// Cerrar sidebar al hacer clic en el overlay
overlay.addEventListener('click', () => {
  sidebar.classList.remove('show');   // Oculta sidebar
  overlay.classList.remove('show');   // Oculta overlay
});


document.getElementById("search-modules").addEventListener("keyup", function() {
  let filtro = this.value.toLowerCase();
  let enlaces = document.querySelectorAll("#sidebar .nav-link");

  enlaces.forEach(function(link) {
    let texto = link.textContent.toLowerCase();
    if (texto.includes(filtro)) {
      link.style.display = "";
    } else {
      link.style.display = "none";
    }
  });
});