// Menjalankan script setelah halaman selesai dimuat /* 202431144 Armando Sianipar */
document.addEventListener("DOMContentLoaded", function() { /* 202431144 Armando Sianipar */

    // Mengambil elemen form dan container alert /* 202431144 Armando Sianipar */
    const form = document.getElementById("gradingForm"); /* 202431144 Armando Sianipar */
    const alertContainer = document.getElementById("jsAlertContainer");

    // Mengecek apakah form tersedia /* 202431144 Armando Sianipar */
    if (form) {
        form.addEventListener("submit", function(event) { /* 202431144 Armando Sianipar */

            // Mengambil nilai input /* 202431144 Armando Sianipar */
            const nama = document.getElementById('nama').value.trim();
            const nim = document.getElementById('nim').value.trim();
            const kehadiran = document.getElementById('kehadiran').value;
            const tugas = document.getElementById('tugas').value;
            const uts = document.getElementById('uts').value;
            const uas = document.getElementById('uas').value;

            // Variabel pesan error /* 202431144 Armando Sianipar */
            let errorMessage = ""; /* 202431144 Armando Sianipar */

            // Validasi Nama dan NIM /* 202431144 Armando Sianipar */
            if (!nama || !nim) { /* 202431144 Armando Sianipar */
                errorMessage = "Kolom Nama dan NIM harus diisi";
            } 
            // Validasi semua nilai harus diisi /* 202431144 Armando Sianipar */
            else if (kehadiran === "" || tugas === "" || uts === "" || uas === "") {
                errorMessage = "Semua kolom harus diisi!";
            } /* 202431144 Armando Sianipar */

            // Jika terdapat error, hentikan submit dan tampilkan pesan
            if (errorMessage !== "") { /* 202431144 Armando Sianipar */
                event.preventDefault();  /* 202431144 Armando Sianipar */
                alertContainer.innerHTML = `
                    <div class="alert-pink">
                        ${errorMessage}
                    </div>
                `;
            } else { /* 202431144 Armando Sianipar */
                // Jika tidak ada error, hapus pesan
                alertContainer.innerHTML = "";
            } /* 202431144 Armando Sianipar */
        }); /* 202431144 Armando Sianipar */
    } /* 202431144 Armando Sianipar */
});
