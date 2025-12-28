function prosesNilai() {  // 202431144 ARMANDO SIANIPAR
    // Fungsi utama untuk memproses nilai mahasiswa saat tombol "Proses" ditekan
    const nama = document.getElementById('nama').value.trim(); // 202431144 ARMANDO SIANIPAR
    // Mengambil nilai input nama dan menghapus spasi di awal/akhir
    const nim = document.getElementById('nim').value.trim(); // 202431144 ARMANDO SIANIPAR
    // Mengambil nilai input NIM dan menghapus spasi di awal/akhir
    const kehadiran = parseFloat(document.getElementById('kehadiran').value);
    // Mengambil nilai kehadiran dan mengubahnya menjadi angka desimal
    const tugas = parseFloat(document.getElementById('tugas').value); // 202431144 ARMANDO SIANIPAR
    // Mengambil nilai tugas dan mengubahnya menjadi angka desimal
    const uts = parseFloat(document.getElementById('uts').value); // 202431144 ARMANDO SIANIPAR
    // Mengambil nilai UTS dan mengubahnya menjadi angka desimal
    const uas = parseFloat(document.getElementById('uas').value); // 202431144 ARMANDO SIANIPAR
    // Mengambil nilai UAS dan mengubahnya menjadi angka desimal
    const alertContainer = document.getElementById('alertContainer'); // 202431144 ARMANDO SIANIPAR
    // Mengambil elemen untuk menampilkan pesan peringatan
    const resultCard = document.getElementById('resultCard'); // 202431144 ARMANDO SIANIPAR
    // Mengambil elemen card hasil penilaian
    alertContainer.innerHTML = '';  // 202431144 ARMANDO SIANIPAR
    // Menghapus pesan alert sebelumnya // 202431144 ARMANDO SIANIPAR
    resultCard.classList.add('d-none');  // 202431144 ARMANDO SIANIPAR
    // Menyembunyikan card hasil sebelum proses baru
    if (!nama || !nim) { // 202431144 ARMANDO SIANIPAR
        // Mengecek apakah nama atau NIM kosong // 202431144 ARMANDO SIANIPAR
        alertContainer.innerHTML = '<div class="alert-pink">Kolom Nama dan NIM harus diisi</div>';
        // Menampilkan pesan error jika nama atau NIM belum diisi
        return;
        // Menghentikan eksekusi fungsi // 202431144 ARMANDO SIANIPAR
    }
    if (isNaN(kehadiran) || isNaN(tugas) || isNaN(uts) || isNaN(uas)) {
        // Mengecek apakah ada nilai yang belum diisi atau bukan angka // 202431144 ARMANDO SIANIPAR
        alertContainer.innerHTML = '<div class="alert-pink">Semua kolom harus diisi!</div>';
        // Menampilkan pesan error jika ada nilai kosong // 202431144 ARMANDO SIANIPAR
        return; // 202431144 ARMANDO SIANIPAR
        // Menghentikan eksekusi fungsi // 202431144 ARMANDO SIANIPAR
    }
    const nilaiAkhir = (kehadiran * 0.1) + (tugas * 0.2) + (uts * 0.3) + (uas * 0.4);
    // Menghitung nilai akhir berdasarkan bobot masing-masing komponen
    let grade = 'E'; // 202431144 ARMANDO SIANIPAR
    // Memberi nilai awal grade E // 202431144 ARMANDO SIANIPAR
    if (nilaiAkhir >= 85) grade = 'A'; // 202431144 ARMANDO SIANIPAR
    // Jika nilai akhir ≥ 85, maka grade A // 202431144 ARMANDO SIANIPAR
    else if (nilaiAkhir >= 70) grade = 'B'; // 202431144 ARMANDO SIANIPAR
    // Jika nilai akhir ≥ 70, maka grade B // 202431144 ARMANDO SIANIPAR
    else if (nilaiAkhir >= 55) grade = 'C'; // 202431144 ARMANDO SIANIPAR
    // Jika nilai akhir ≥ 55, maka grade C // 202431144 ARMANDO SIANIPAR
    else if (nilaiAkhir >= 40) grade = 'D'; // 202431144 ARMANDO SIANIPAR
    // Jika nilai akhir ≥ 40, maka grade D // 202431144 ARMANDO SIANIPAR
    let statusLulus = false; // 202431144 ARMANDO SIANIPAR
    // Variabel untuk menentukan status kelulusan (default: tidak lulus)
    if (nilaiAkhir >= 60 && kehadiran > 70 && tugas >= 40 && uts >= 40 && uas >= 40) {
        // Mengecek syarat kelulusan mahasiswa
        statusLulus = true; // 202431144 ARMANDO SIANIPAR
        // Mengubah status menjadi lulus jika semua syarat terpenuhi
    }
    renderResult(nama, nim, kehadiran, tugas, uts, uas, nilaiAkhir, grade, statusLulus);
    // Memanggil fungsi untuk menampilkan hasil penilaian // 202431144 ARMANDO SIANIPAR
}
function renderResult(nama, nim, kehadiran, tugas, uts, uas, nilaiAkhir, grade, statusLulus) {
    // Fungsi untuk menampilkan hasil penilaian ke halaman // 202431144 ARMANDO SIANIPAR
    const resultCard = document.getElementById('resultCard');
    // Mengambil card hasil // 202431144 ARMANDO SIANIPAR
    const resultHeader = document.getElementById('resultHeader');
    // Mengambil header card hasil // 202431144 ARMANDO SIANIPAR
    const btnSelesai = document.getElementById('btnSelesai');
    // Mengambil tombol "Selesai" // 202431144 ARMANDO SIANIPAR
    const resStatus = document.getElementById('resStatus');
    // Mengambil elemen status kelulusan // 202431144 ARMANDO SIANIPAR
    document.getElementById('resNama').innerText = nama;
    // Menampilkan nama mahasiswa // 202431144 ARMANDO SIANIPAR
    document.getElementById('resNim').innerText = nim;
    // Menampilkan NIM mahasiswa // 202431144 ARMANDO SIANIPAR
    document.getElementById('resKehadiran').innerText = kehadiran;
    // Menampilkan nilai kehadiran // 202431144 ARMANDO SIANIPAR
    document.getElementById('resTugas').innerText = tugas;
    // Menampilkan nilai tugas // 202431144 ARMANDO SIANIPAR
    document.getElementById('resUts').innerText = uts;
    // Menampilkan nilai UTS // 202431144 ARMANDO SIANIPAR
    document.getElementById('resUas').innerText = uas;
    // Menampilkan nilai UAS // 202431144 ARMANDO SIANIPAR
    document.getElementById('resAkhir').innerText = nilaiAkhir.toFixed(2);
    // Menampilkan nilai akhir dengan 2 angka desimal
    document.getElementById('resGrade').innerText = grade;
    // Menampilkan grade mahasiswa // 202431144 ARMANDO SIANIPAR
    if (statusLulus) { // 202431144 ARMANDO SIANIPAR
        // Jika mahasiswa lulus // 202431144 ARMANDO SIANIPAR
        resultHeader.className = 'card-header text-white bg-success-custom';
        // Mengubah warna header menjadi hijau // 202431144 ARMANDO SIANIPAR
        btnSelesai.className = 'btn w-100 text-white bg-success-custom';
        // Mengubah warna tombol menjadi hijau
        resStatus.innerText = 'LULUS'; // 202431144 ARMANDO SIANIPAR
        // Menampilkan teks LULUS // 202431144 ARMANDO SIANIPAR
        resStatus.className = 'text-lulus fw-bold';
        // Memberi warna hijau pada teks status
    } else { // 202431144 ARMANDO SIANIPAR
        // Jika mahasiswa tidak lulus // 202431144 ARMANDO SIANIPAR
        resultHeader.className = 'card-header text-white bg-danger-custom';
        // Mengubah warna header menjadi merah // 202431144 ARMANDO SIANIPAR
        btnSelesai.className = 'btn w-100 text-white bg-danger-custom';
        // Mengubah warna tombol menjadi merah // 202431144 ARMANDO SIANIPAR
        resStatus.innerText = 'TIDAK LULUS';
        // Menampilkan teks TIDAK LULUS // 202431144 ARMANDO SIANIPAR
        resStatus.className = 'text-gagal fw-bold';
        // Memberi warna merah pada teks status // 202431144 ARMANDO SIANIPAR
    } // 202431144 ARMANDO SIANIPAR
    resultCard.classList.remove('d-none');
    // Menampilkan card hasil // 202431144 ARMANDO SIANIPAR
    resultCard.scrollIntoView({ behavior: 'smooth' });
    // Menggeser tampilan layar ke bagian hasil secara halus
}
function resetForm() { // 202431144 ARMANDO SIANIPAR
    // Fungsi untuk mereset form dan tampilan
    document.getElementById('gradingForm').reset();
    // Mengosongkan seluruh input form // 202431144 ARMANDO SIANIPAR
    document.getElementById('alertContainer').innerHTML = '';
    // Menghapus pesan alert // 202431144 ARMANDO SIANIPAR
    document.getElementById('resultCard').classList.add('d-none');
    // Menyembunyikan card hasil // 202431144 ARMANDO SIANIPAR
    window.scrollTo({ top: 0, behavior: 'smooth' });
    // Mengembalikan tampilan ke bagian atas halaman
} // 202431144 ARMANDO SIANIPAR
