function openModalPanen(element) {
    const data = JSON.parse(element.getAttribute('data-json'));
    
    // Isi data ke form panen
    document.getElementById('panen_kolam_id').value = data.id;
    document.getElementById('panen_pemilik').value = data.pemilik;
    document.getElementById('panen_jenis').value = data.jenis_ikan;
    document.getElementById('panen_bibit').value = data.berat_bibit; // Pastikan kolom ini ada di DB
    
    // Buka Modal
    new bootstrap.Modal(document.getElementById('modalPanen')).show();
}