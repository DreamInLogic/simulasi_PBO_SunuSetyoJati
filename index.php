<?php
// File: index.php

// Load semua file yang dibutuhkan
require_once 'koneksi/database.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// 2. Ambil parameter halaman aktif dari URL (default ke 'dashboard')
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// 3. Tarik data dari database (beberapa data tetap ditarik untuk hitung statistik card)
$daftarReguler   = PendaftaranReguler::getDaftarReguler($db);
$daftarPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$daftarKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

$totalReguler = count($daftarReguler);
$totalPrestasi = count($daftarPrestasi);
$totalKedinasan = count($daftarKedinasan);
$totalSemua = $totalReguler + $totalPrestasi + $totalKedinasan;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem PMB | Sunu Setyo Jati</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Top Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed top-0 z-50 w-full px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <i class="fa-solid fa-graduation-cap text-indigo-600 text-2xl mr-3"></i>
                <span class="text-xl font-bold text-gray-800 tracking-tight">Sistem PMB Jalur Spesifik</span>
            </div>
            <!-- Menu Navigasi Utama -->
            <div class="hidden md:flex space-x-1 font-medium text-sm">
                <a href="index.php?page=dashboard" class="px-4 py-2 rounded-lg transition-colors <?= $page == 'dashboard' ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-600 hover:bg-gray-100' ?>">
                    <i class="fa-solid fa-chart-pie mr-1.5"></i> Ringkasan
                </a>
                <a href="index.php?page=reguler" class="px-4 py-2 rounded-lg transition-colors <?= $page == 'reguler' ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-100' ?>">
                    <i class="fa-solid fa-user-graduate mr-1.5"></i> Reguler
                </a>
                <a href="index.php?page=prestasi" class="px-4 py-2 rounded-lg transition-colors <?= $page == 'prestasi' ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-100' ?>">
                    <i class="fa-solid fa-award mr-1.5"></i> Prestasi
                </a>
                <a href="index.php?page=kedinasan" class="px-4 py-2 rounded-lg transition-colors <?= $page == 'kedinasan' ? 'bg-amber-50 text-amber-700 font-semibold' : 'text-gray-600 hover:bg-gray-100' ?>">
                    <i class="fa-solid fa-building-shield mr-1.5"></i> Kedinasan
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="text-xs text-gray-500 font-medium">Praktikan PBO</p>
                    <p class="text-sm font-semibold text-gray-700">Sunu Setyo Jati</p>
                </div>
                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold">SS</div>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="p-6 pt-24 max-w-7xl mx-auto space-y-8">
        
        <!-- Kondisi Halaman 1: RINGKASAN DASHBOARD -->
        <?php if ($page == 'dashboard'): ?>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Selamat Datang di Portal PMB</h1>
                <p class="text-sm text-gray-500 mt-1">Gunakan menu navigasi di atas untuk berpindah halaman dan melihat detail spesifik data subclass.</p>
            </div>

            <!-- Dashboard Cards (Statistik) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase">Total Semua Pendaftar</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-1"><?= $totalSemua; ?></h3>
                    </div>
                    <div class="p-4 bg-gray-100 text-gray-600 rounded-xl"><i class="fa-solid fa-users text-xl"></i></div>
                </div>
                <a href="index.php?page=reguler" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:border-blue-300 transition-all group">
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase">Jalur Reguler</p>
                        <h3 class="text-3xl font-bold text-blue-600 mt-1"><?= $totalReguler; ?></h3>
                        <span class="text-xs text-blue-500 group-hover:underline mt-1 block">Buka Halaman <i class="fa-solid fa-arrow-right ml-1"></i></span>
                    </div>
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl"><i class="fa-solid fa-user-graduate text-xl"></i></div>
                </a>
                <a href="index.php?page=prestasi" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:border-green-300 transition-all group">
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase">Jalur Prestasi</p>
                        <h3 class="text-3xl font-bold text-green-600 mt-1"><?= $totalPrestasi; ?></h3>
                        <span class="text-xs text-green-500 group-hover:underline mt-1 block">Buka Halaman <i class="fa-solid fa-arrow-right ml-1"></i></span>
                    </div>
                    <div class="p-4 bg-green-50 text-green-600 rounded-xl"><i class="fa-solid fa-award text-xl"></i></div>
                </a>
                <a href="index.php?page=kedinasan" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:border-amber-300 transition-all group">
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase">Jalur Kedinasan</p>
                        <h3 class="text-3xl font-bold text-amber-600 mt-1"><?= $totalKedinasan; ?></h3>
                        <span class="text-xs text-amber-500 group-hover:underline mt-1 block">Buka Halaman <i class="fa-solid fa-arrow-right ml-1"></i></span>
                    </div>
                    <div class="p-4 bg-amber-50 text-amber-600 rounded-xl"><i class="fa-solid fa-building-shield text-xl"></i></div>
                </a>
            </div>

            <!-- Kartu Edukasi OOP -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-8 rounded-2xl text-white shadow-md">
                <h3 class="text-xl font-bold mb-2"><i class="fa-solid fa-code mr-2"></i>Informasi Implementasi OOP</h3>
                <p class="text-sm text-indigo-100 max-w-2xl leading-relaxed">Proyek ini dirancang penuh menggunakan <strong>PHP Object-Oriented Programming (OOP)</strong>. Menghubungkan abstraksi basis data PDO, pembagian subclass konkrit, serta implementasi Polimorfisme Overriding untuk kalkulasi biaya pendaftaran akhir mahasiswa.</p>
            </div>

        <!-- Kondisi Halaman 2: HALAMAN SUBCLASS REGULER -->
        <?php elseif ($page == 'reguler'): ?>
            <div>
                <a href="index.php?page=dashboard" class="text-xs text-blue-600 font-semibold hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Ringkasan</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">Manajemen Jalur Reguler</h1>
                <p class="text-sm text-gray-500">Menampilkan objek khusus dari subclass <code class="bg-gray-200 text-gray-700 px-1 py-0.5 rounded">PendaftaranReguler</code>.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-blue-50 to-white border-b border-gray-100 flex items-center">
                    <i class="fa-solid fa-user-graduate text-blue-600 text-lg mr-3"></i>
                    <h2 class="text-md font-bold text-gray-800">Tabel Data Calon Mahasiswa</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Nama Lengkap</th>
                                <th class="px-6 py-4 font-semibold">Asal Sekolah</th>
                                <th class="px-6 py-4 font-semibold text-center">Nilai Ujian</th>
                                <th class="px-6 py-4 font-semibold">Program Studi & Lokasi</th>
                                <th class="px-6 py-4 font-semibold text-right">Biaya Dasar</th>
                                <th class="px-6 py-4 font-semibold text-right text-blue-600">Total Biaya (Polimorfik)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($daftarReguler as $mhs): ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#<?= $mhs->getIdPendaftaran(); ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($mhs->getNamaCalon()); ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                                    <td class="px-6 py-4 text-center"><span class="bg-gray-100 text-gray-700 font-medium px-2.5 py-1 rounded-md"><?= $mhs->getNilaiUjian(); ?></span></td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-700 font-medium"><?= htmlspecialchars($mhs->getPilihanProdi()); ?></div>
                                        <div class="text-xs text-gray-400"><i class="fa-solid fa-location-dot mr-1"></i><?= htmlspecialchars($mhs->getLokasiKampus()); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- Kondisi Halaman 3: HALAMAN SUBCLASS PRESTASI -->
        <?php elseif ($page == 'prestasi'): ?>
            <div>
                <a href="index.php?page=dashboard" class="text-xs text-blue-600 font-semibold hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Ringkasan</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">Manajemen Jalur Prestasi</h1>
                <p class="text-sm text-gray-500">Menampilkan objek khusus dari subclass <code class="bg-gray-200 text-gray-700 px-1 py-0.5 rounded">PendaftaranPrestasi</code>.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-green-50 to-white border-b border-gray-100 flex items-center">
                    <i class="fa-solid fa-award text-green-600 text-lg mr-3"></i>
                    <h2 class="text-md font-bold text-gray-800">Tabel Data Calon Mahasiswa</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Nama Lengkap</th>
                                <th class="px-6 py-4 font-semibold">Asal Sekolah</th>
                                <th class="px-6 py-4 font-semibold text-center">Nilai Ujian</th>
                                <th class="px-6 py-4 font-semibold">Detail Prestasi</th>
                                <th class="px-6 py-4 font-semibold text-right">Biaya Dasar</th>
                                <th class="px-6 py-4 font-semibold text-right text-green-600">Total Biaya (Overridden)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($daftarPrestasi as $mhs): ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#<?= $mhs->getIdPendaftaran(); ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($mhs->getNamaCalon()); ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                                    <td class="px-6 py-4 text-center"><span class="bg-gray-100 text-gray-700 font-medium px-2.5 py-1 rounded-md"><?= $mhs->getNilaiUjian(); ?></span></td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 mb-1">
                                            Tier: <?= htmlspecialchars($mhs->getTingkatPrestasi()); ?>
                                        </span>
                                        <div class="text-gray-700 text-xs font-medium"><?= htmlspecialchars($mhs->getJenisPrestasi()); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900">
                                        Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?>
                                        <span class="block text-[10px] text-green-500 font-normal">Potongan Rp50k</span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- Kondisi Halaman 4: HALAMAN SUBCLASS KEDINASAN -->
        <?php elseif ($page == 'kedinasan'): ?>
            <div>
                <a href="index.php?page=dashboard" class="text-xs text-blue-600 font-semibold hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Ringkasan</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">Manajemen Jalur Kedinasan</h1>
                <p class="text-sm text-gray-500">Menampilkan objek khusus dari subclass <code class="bg-gray-200 text-gray-700 px-1 py-0.5 rounded">PendaftaranKedinasan</code>.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-amber-50 to-white border-b border-gray-100 flex items-center">
                    <i class="fa-solid fa-building-shield text-amber-600 text-lg mr-3"></i>
                    <h2 class="text-md font-bold text-gray-800">Tabel Data Calon Mahasiswa</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Nama Lengkap</th>
                                <th class="px-6 py-4 font-semibold">Asal Sekolah</th>
                                <th class="px-6 py-4 font-semibold text-center">Nilai Ujian</th>
                                <th class="px-6 py-4 font-semibold">Ikatan Dinas & Sponsor</th>
                                <th class="px-6 py-4 font-semibold text-right">Biaya Dasar</th>
                                <th class="px-6 py-4 font-semibold text-right text-amber-600">Total Biaya (Overridden)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($daftarKedinasan as $mhs): ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#<?= $mhs->getIdPendaftaran(); ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= htmlspecialchars($mhs->getNamaCalon()); ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                                    <td class="px-6 py-4 text-center"><span class="bg-gray-100 text-gray-700 font-medium px-2.5 py-1 rounded-md"><?= $mhs->getNilaiUjian(); ?></span></td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs font-semibold text-gray-700"><i class="fa-solid fa-file-contract mr-1 text-gray-400"></i><?= htmlspecialchars($mhs->getSkIkatanDinas()); ?></div>
                                        <div class="text-xs text-amber-600 font-medium mt-0.5"><?= htmlspecialchars($mhs->getInstansiSponsor()); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900">
                                        Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?>
                                        <span class="block text-[10px] text-amber-500 font-normal">Surcharge +25%</span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12 py-6 text-center text-xs text-gray-400">
        &copy; 2026 - UAS Praktikum Pemrograman Berorientasi Objek. Disusun oleh Sunu Setyo Jati.
    </footer>

</body>
</html>