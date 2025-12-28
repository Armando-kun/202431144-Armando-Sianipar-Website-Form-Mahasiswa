<!DOCTYPE html> <!-- 202431144 Armando Sianipar -->
<html lang="en"> <!-- 202431144 Armando Sianipar -->
<head> <!-- 202431144 Armando Sianipar -->
    <!-- Menentukan encoding karakter -->
    <meta charset="UTF-8"> <!-- 202431144 Armando Sianipar -->

    <!-- Membuat tampilan responsif di berbagai ukuran layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman --> <!-- 202431144 Armando Sianipar -->
    <title>Penilaian Mahasiswa</title> <!-- 202431144 Armando Sianipar -->

    <!-- Import Bootstrap CSS dari CDN --> <!-- 202431144 Armando Sianipar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Import file CSS buatan sendiri --> <!-- 202431144 Armando Sianipar -->
    <link rel="stylesheet" href="style.css"> <!-- 202431144 Armando Sianipar -->
</head> <!-- 202431144 Armando Sianipar -->

<body>
    <!-- Container utama halaman --> <!-- 202431144 Armando Sianipar -->
    <div class="container mt-4 mb-5 px-5"> <!-- 202431144 Armando Sianipar -->
        
        <!-- Card form input --> <!-- 202431144 Armando Sianipar -->
        <div class="card shadow-sm mb-4"> <!-- 202431144 Armando Sianipar -->
            <div class="card-header text-center"> <!-- 202431144 Armando Sianipar -->
                <h1 class="h4 mb-0">Form Penilaian Mahasiswa</h1>
            </div> <!-- 202431144 Armando Sianipar -->
            
            <div class="card-body"> <!-- 202431144 Armando Sianipar -->
                <!-- Form input nilai mahasiswa --> <!-- 202431144 Armando Sianipar -->
                <form method="post" id="gradingForm" novalidate>

                    <!-- Input Nama --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="nama" class="form-label">Masukkan Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" 
                               value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>" placeholder="Masukkan Nama Anda">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Input NIM --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="nim" class="form-label">Masukkan NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" 
                               value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>" placeholder="202431xxx">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Input Kehadiran --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="kehadiran" class="form-label">Nilai Kehadiran (10%)</label>
                        <input type="number" class="form-control" id="kehadiran" name="kehadiran" 
                               value="<?php echo isset($_POST['kehadiran']) ? htmlspecialchars($_POST['kehadiran']) : ''; ?>" placeholder="Untuk Lulus minimal 70%" min="0" max="100">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Input Tugas --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="tugas" class="form-label">Nilai Tugas (20%)</label>
                        <input type="number" class="form-control" id="tugas" name="tugas" 
                               value="<?php echo isset($_POST['tugas']) ? htmlspecialchars($_POST['tugas']) : ''; ?>" placeholder="0 - 100" min="0" max="100">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Input UTS --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="uts" class="form-label">Nilai UTS (30%)</label>
                        <input type="number" class="form-control" id="uts" name="uts" 
                               value="<?php echo isset($_POST['uts']) ? htmlspecialchars($_POST['uts']) : ''; ?>" placeholder="0 - 100" min="0" max="100">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Input UAS --> <!-- 202431144 Armando Sianipar -->
                    <div class="mb-3"> <!-- 202431144 Armando Sianipar -->
                        <label for="uas" class="form-label">Nilai UAS (40%)</label>
                        <input type="number" class="form-control" id="uas" name="uas" 
                               value="<?php echo isset($_POST['uas']) ? htmlspecialchars($_POST['uas']) : ''; ?>" placeholder="0 - 100" min="0" max="100">
                    </div> <!-- 202431144 Armando Sianipar -->

                    <!-- Tombol submit --> <!-- 202431144 Armando Sianipar -->
                    <div class="d-grid gap-2"> <!-- 202431144 Armando Sianipar -->
                        <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                    </div> <!-- 202431144 Armando Sianipar -->
                </form> <!-- 202431144 Armando Sianipar -->

                <!-- Container pesan error dari JavaScript -->
                <div id="jsAlertContainer"></div> <!-- 202431144 Armando Sianipar -->

                <?php
                // Mengecek apakah form telah disubmit
                if (isset($_POST['proses'])) { // Armando Sianipar

                    // Mengambil dan membersihkan data input
                    $nama = trim($_POST['nama']); // Armando Sianipar
                    $nim = trim($_POST['nim']); // Armando Sianipar
                    $kehadiran = $_POST['kehadiran']; // Armando Sianipar
                    $tugas = $_POST['tugas']; // Armando Sianipar
                    $uts = $_POST['uts']; // Armando Sianipar
                    $uas = $_POST['uas']; // Armando Sianipar

                    // Variabel pesan error // Armando Sianipar
                    $errorMsg = ""; // Armando Sianipar

                    // Validasi input Nama dan NIM // Armando Sianipar
                    if (empty($nama) || empty($nim)) { // Armando Sianipar
                        $errorMsg = "Kolom Nama dan NIM harus diisi";
                    }
                    // Validasi semua nilai harus diisi // Armando Sianipar
                    elseif ($kehadiran === "" || $tugas === "" || $uts === "" || $uas === "") {
                        $errorMsg = "Semua kolom harus diisi!"; // Armando Sianipar
                    } // Armando Sianipar

                    // Jika terdapat error, tampilkan pesan
                    if (!empty($errorMsg)) { // Armando Sianipar

                        echo "<div class='alert-pink'>$errorMsg</div>";
                    }  // Armando Sianipar
                    // Jika tidak ada error, lakukan perhitungan nilai
                    else { // Armando Sianipar

                        // Konversi nilai ke float // Armando Sianipar
                        $valKehadiran = floatval($kehadiran);
                        $valTugas = floatval($tugas);
                        $valUts = floatval($uts); // Armando Sianipar
                        $valUas = floatval($uas); // Armando Sianipar

                        // Perhitungan nilai akhir berdasarkan bobot
                        $nilaiAkhir = ($valKehadiran * 0.10) + ($valTugas * 0.20) + ($valUts * 0.30) + ($valUas * 0.40);

                        // Penentuan grade // Armando Sianipar
                        $grade = "E"; // Armando Sianipar
                        if ($nilaiAkhir >= 85) $grade = "A"; // Armando Sianipar
                        elseif ($nilaiAkhir >= 70) $grade = "B"; // Armando Sianipar
                        elseif ($nilaiAkhir >= 55) $grade = "C"; // Armando Sianipar
                        elseif ($nilaiAkhir >= 40) $grade = "D"; // Armando Sianipar

                        // Penentuan kelulusan // Armando Sianipar
                        $isLulus = false; // Armando Sianipar
                        if ($nilaiAkhir >= 60 && $valKehadiran > 70 && $valTugas >= 40 && $valUts >= 40 && $valUas >= 40) {
                            $isLulus = true; // Armando Sianipar
                        } // Armando Sianipar

                        // Menentukan tampilan status // Armando Sianipar
                        $headerClass = $isLulus ? "bg-success-custom" : "bg-danger-custom";
                        $statusText  = $isLulus ? "LULUS" : "TIDAK LULUS";
                        $statusClass = $isLulus ? "text-lulus" : "text-gagal";

                        // Format nilai akhir // Armando Sianipar
                        $nilaiFormatted = number_format($nilaiAkhir, 2);

                        // Menampilkan hasil penilaian // Armando Sianipar
                        echo "
                        <div class='card shadow-sm mt-4' id='resultCard'>
                            <div class='card-header text-white $headerClass'>
                                <h5 class='mb-0'>Hasil Penilaian</h5>
                            </div>
                            <div class='card-body'>
                                <div class='d-flex justify-content-between align-items-center px-5 mb-4 mt-2'>
                                    <h3 class='fw-bold m-0'>Nama: <span>" . htmlspecialchars($nama) . "</span></h3>
                                    <h3 class='fw-bold m-0'>NIM: <span>" . htmlspecialchars($nim) . "</span></h3>
                                </div>

                                <p class='mb-2 fw-bold'>Nilai Kehadiran: <span class='fw-normal'>$valKehadiran</span>%</p>
                                <p class='mb-2 fw-bold'>Nilai Tugas: <span class='fw-normal'>$valTugas</span></p>
                                <p class='mb-2 fw-bold'>Nilai UTS: <span class='fw-normal'>$valUts</span></p>
                                <p class='mb-2 fw-bold'>Nilai UAS: <span class='fw-normal'>$valUas</span></p>
                                
                                <p class='mb-2 fw-bold'>Nilai Akhir: <span class='fw-normal'>$nilaiFormatted</span></p>
                                <p class='mb-2 fw-bold'>Grade: <span class='fw-normal'>$grade</span></p>
                                
                                <p class='mb-0 fw-bold fs-5'>Status: <span class='$statusClass fw-bold'>$statusText</span></p>
                            </div>
                            <div class='p-3'>
                                <a href='index.php' class='btn w-100 text-white $headerClass'>Selesai</a>
                            </div>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Import Bootstrap JS --> <!-- 202431144 Armando Sianipar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <!-- Import JavaScript custom -->
    <script src="script.js"></script> <!-- 202431144 Armando Sianipar -->
</body> <!-- 202431144 Armando Sianipar -->
</html> <!-- 202431144 Armando Sianipar -->
