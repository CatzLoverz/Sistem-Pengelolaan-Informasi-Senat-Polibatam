/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

const editButtons = document.querySelectorAll('.edit-button');
editButtons.forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const judul = button.getAttribute('data-judul');
        const deskripsi = button.getAttribute('data-deskripsi');
        const tanggal = button.getAttribute('data-tanggal');
        const penulis = button.getAttribute('data-penulis');
        const foto = button.getAttribute('data-foto');

        // Set the modal values
        document.getElementById('editId').value = id;
        document.getElementById('editJudul').value = judul;
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editTanggal').value = tanggal;
        document.getElementById('editPenulis').value = penulis;

        // Handle existing photo
        document.getElementById('old_foto').value = foto;
        const fotoContainer = document.getElementById('existingFotoContainer');
        const fotoElement = document.getElementById('existingFoto');
        if (foto) {
            fotoElement.src = 'uploads/' + foto;
            fotoContainer.style.display = 'block';
        } else {
            fotoContainer.style.display = 'none';
        }
    });
});


