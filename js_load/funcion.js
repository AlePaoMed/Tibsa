  const searchInput = document.getElementById("search-modules");


searchInput.addEventListener("keyup", function() {
    const filtro = this.value.toLowerCase();
    const enlaces = document.querySelectorAll("#sidebar .nav-link");

    enlaces.forEach(link => {
        const texto = link.textContent.toLowerCase();
        link.style.display = texto.includes(filtro) ? "" : "none";
    });

    const colapsables = document.querySelectorAll("#sidebar .collapse");
    colapsables.forEach(collapseEl => {
        const hijos = collapseEl.querySelectorAll(".nav-link");
        const algunoVisible = Array.from(hijos).some(hijo => hijo.style.display !== "none");
        const collapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);

        if (algunoVisible) {
            collapse.show();
        } else {
            collapse.hide();
        }
    });
});


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
