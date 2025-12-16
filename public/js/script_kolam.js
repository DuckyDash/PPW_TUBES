document.addEventListener('DOMContentLoaded', function() {
    const modalElement = document.getElementById('modalKolam');
    if (modalElement) {
        window.myModal = new bootstrap.Modal(modalElement);
    }
});

function openModalTambah() {
    document.getElementById('modalTitle').innerText = 'Tambah Data Kolam';
    document.getElementById('formKolam').reset();
    
    document.getElementById('formKolam').action = "/data_kolam";

    document.getElementById('methodInput').innerHTML = '';

    window.myModal.show();
}

function openModalEdit(element) {
    const dataString = element.getAttribute('data-json');
    const data = JSON.parse(dataString);

    document.getElementById('modalTitle').innerText = 'Edit Data Kolam';
    
    document.getElementById('nama_kolam').value = data.nama_kolam;
    document.getElementById('jenis_ikan').value = data.jenis_ikan;
    document.getElementById('suhu_air').value = data.suhu_air;
    document.getElementById('ph_air').value = data.ph_air;
    document.getElementById('status_pakan').value = data.status_pakan;
    document.getElementById('status').value = data.status;

    document.getElementById('formKolam').action = "/data_kolam/" + data.id;

    document.getElementById('methodInput').innerHTML = '<input type="hidden" name="_method" value="PUT">';

    window.myModal.show();
}

function showDetail(element) {
    const dataString = element.getAttribute('data-json');
    const data = JSON.parse(dataString);
    
    alert("Detail Kolam: " + data.nama_kolam + "\nPemilik: " + data.pemilik);
}