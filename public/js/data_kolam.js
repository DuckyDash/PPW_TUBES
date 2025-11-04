document.addEventListener('DOMContentLoaded', () => {
  const kolamContainer = document.getElementById('kolamContainer');
  const formKolam = document.getElementById('formKolam');
  const modalKolam = new bootstrap.Modal(document.getElementById('modalKolam'));
  const detailKolamModal = new bootstrap.Modal(document.getElementById('modalDetailKolam'));
  const detailKolamBody = document.getElementById('detailKolamBody');

  let kolamList = [
    { nama: "Kolam 1", ikan: "Lele", suhu: "28", ph: "6.8", pakan: "Diberikan", pemilik: "Sujarwo", status: "Aktif" },
    { nama: "Kolam 2", ikan: "Nila", suhu: "29", ph: "7.0", pakan: "Belum Diberikan", pemilik: "Darto", status: "Dalam Perawatan" },
    { nama: "Kolam 3", ikan: "Gurame", suhu: "27", ph: "6.5", pakan: "Diberikan", pemilik: "Slamet", status: "Tidak Aktif" }
  ];

  function renderKolam() {
    kolamContainer.innerHTML = '';
    kolamList.forEach((kolam, index) => {
      let statusClass =
        kolam.status === "Aktif" ? "status-aktif" :
        kolam.status === "Dalam Perawatan" ? "status-perawatan" : "status-nonaktif";

      kolamContainer.innerHTML += `
        <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="card kolam-card shadow-sm">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="fw-bold text-primary mb-1">${kolam.nama}
                  <span class="status-dot ${statusClass}"></span>
                </h6>
                <small class="text-muted">${kolam.status}</small>
              </div>
              <div class="dropdown">
                <button class="btn btn-light btn-sm p-1 rounded-circle" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                  <li><a class="dropdown-item text-primary" href="#" onclick="showDetail(${index})"><i class="bi bi-eye me-1"></i> Detail</a></li>
                  <li><a class="dropdown-item text-warning" href="#" onclick="editKolam(${index})"><i class="bi bi-pencil me-1"></i> Edit</a></li>
                  <li><a class="dropdown-item text-danger" href="#" onclick="deleteKolam(${index})"><i class="bi bi-trash me-1"></i> Hapus</a></li>
                </ul>
              </div>
            </div>
            <p class="mb-1"><strong>Jenis Ikan:</strong> ${kolam.ikan}</p>
            <p class="mb-1"><strong>Suhu Air:</strong> ${kolam.suhu}°C</p>
            <p class="mb-1"><strong>PH Air:</strong> ${kolam.ph}</p>
            <p class="mb-1"><strong>Status Pakan:</strong> ${kolam.pakan}</p>
            <p class="mb-0"><strong>Pemilik:</strong> ${kolam.pemilik}</p>
          </div>
        </div>`;
    });
  }

  formKolam.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = {
      nama: kolamName.value,
      ikan: jenisIkan.value,
      suhu: suhuAir.value,
      ph: phAir.value,
      pakan: statusPakan.value,
      pemilik: pemilikKolam.value,
      status: statusKolam.value
    };

    const editIndex = document.getElementById('editIndex').value;
    if (editIndex) {
      kolamList[editIndex] = data;
    } else {
      kolamList.push(data);
    }

    renderKolam();
    formKolam.reset();
    document.getElementById('editIndex').value = '';
    modalKolam.hide();
  });

  window.showDetail = (index) => {
    const k = kolamList[index];
    detailKolamBody.innerHTML = `
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Nama Kolam:</strong> ${k.nama}</li>
        <li class="list-group-item"><strong>Jenis Ikan:</strong> ${k.ikan}</li>
        <li class="list-group-item"><strong>Suhu Air:</strong> ${k.suhu}°C</li>
        <li class="list-group-item"><strong>PH Air:</strong> ${k.ph}</li>
        <li class="list-group-item"><strong>Status Pakan:</strong> ${k.pakan}</li>
        <li class="list-group-item"><strong>Pemilik:</strong> ${k.pemilik}</li>
        <li class="list-group-item"><strong>Status Kolam:</strong> ${k.status}</li>
      </ul>`;
    detailKolamModal.show();
  };

  window.editKolam = (index) => {
    const k = kolamList[index];
    kolamName.value = k.nama;
    jenisIkan.value = k.ikan;
    suhuAir.value = k.suhu;
    phAir.value = k.ph;
    statusPakan.value = k.pakan;
    pemilikKolam.value = k.pemilik;
    statusKolam.value = k.status;
    document.getElementById('editIndex').value = index;
    modalKolam.show();
  };

  window.deleteKolam = (index) => {
    if (confirm('Yakin ingin menghapus data kolam ini?')) {
      kolamList.splice(index, 1);
      renderKolam();
    }
  };

  renderKolam();
});
