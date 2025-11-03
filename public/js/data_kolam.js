document.addEventListener("DOMContentLoaded", () => {
    const kolamForm = document.getElementById("formKolam");
    const kolamContainer = document.getElementById("kolamContainer");
    const modal = new bootstrap.Modal(document.getElementById("modalKolam"));

    kolamForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const kolamName = document.getElementById("kolamName").value;
        const jenisIkan = document.getElementById("jenisIkan").value;
        const suhuAir = document.getElementById("suhuAir").value;
        const phAir = document.getElementById("phAir").value;
        const statusPakan = document.getElementById("statusPakan").value;
        const pemilikKolam = document.getElementById("pemilikKolam").value;

        const newCard = document.createElement("div");
        newCard.className = "col-md-6 col-lg-4 col-xl-3";
        newCard.innerHTML = `
          <div class="card p-3 shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="fw-bold">${kolamName} <span class="dot"></span></h6>
              <i class="bi bi-gear"></i>
            </div>
            <p class="mb-1"><strong>Jenis Ikan:</strong> ${jenisIkan}</p>
            <p class="mb-1"><strong>Suhu Air:</strong> ${suhuAir}°C</p>
            <p class="mb-1"><strong>PH Air:</strong> ${phAir}</p>
            <p class="mb-1"><strong>Status Pakan:</strong> <span class="text-success">${statusPakan}</span></p>
            <p class="mb-0"><strong>Pemilik Kolam:</strong> ${pemilikKolam}</p>
          </div>
        `;

        kolamContainer.appendChild(newCard);
        kolamForm.reset();
        modal.hide();
    });
});
