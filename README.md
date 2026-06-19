# Sistem Manajemen Pendaftaran Mahasiswa Baru (PMB) Jalur Spesifik
> **Tugas Simulasi / Latihan UAS Praktikum Pemrograman Berorientasi Objek (PBO)**

Aplikasi web manajemen pendaftaran mahasiswa baru berbasis **PHP-OOP** murni dengan antarmuka modern menggunakan **Tailwind CSS**. Sistem ini mengimplementasikan konsep-konsep utama PBO seperti *Abstraction*, *Inheritance*, *Encapsulation*, dan *Polymorphism (Method Overriding)*.

## 👤 Identitas Praktikan
- **Nama Lengkap:** Sunu Setyo Jati
- **Mata Kuliah:** Praktikum Pemrograman Berorientasi Objek

---

## 🛠️ Arsitektur & Penerapan OOP

Sistem ini dirancang dengan struktur berorientasi objek yang bersih dan terpisah:

1. **Abstraction (Kelas Abstrak `Pendaftaran`)**
   - Berfungsi sebagai cetak biru (*blueprint*) induk yang menyimpan properti global dengan hak akses `protected`.
   - Mendeklarasikan *abstract method* `hitungTotalBiaya()` dan `tampilkanInfoJalur()` yang wajib di-implementasikan oleh setiap kelas anak.

2. **Inheritance & Encapsulation (Subclass)**
   - **`PendaftaranReguler`**: Menyimpan atribut spesifik `pilihan_prodi` dan `lokasi_kampus`.
   - **`PendaftaranPrestasi`**: Menyimpan atribut spesifik `jenis_prestasi` dan `tingkat_prestasi`.
   - **`PendaftaranKedinasan`**: Menyimpan atribut spesifik `sk_ikatan_dinas` dan `instansi_sponsor`.
   - Semua properti spesifik di-enkapsulasi menggunakan hak akses `private` dan diakses melalui metode *Getter*.

3. **Polymorphism (Method Overriding)**
   - Melakukan *override* fungsi `hitungTotalBiaya()` pada setiap subclass dengan logika bisnis tersendiri:
     - **Reguler**: Total Biaya = Biaya Pendaftaran Dasar murni.
     - **Prestasi**: Total Biaya = Biaya Pendaftaran Dasar - Rp50.000 (Potongan apresiasi).
     - **Kedinasan**: Total Biaya = Biaya Pendaftaran Dasar * 1.25 (Surcharge administrasi 25%).

4. **Database Terpusat & PDO Connection**
   - Menggunakan satu tabel terpusat (`tabel_pendaftaran`) dengan pendekatan *nullable attributes* untuk kolom spesifik anak.
   - Koneksi database menggunakan driver **PDO** (`koneksi/database.php`) yang aman dari SQL Injection.
   - Setiap subclass memiliki metode static query sendiri (seperti `getDaftarReguler($db)`) untuk menarik data secara spesifik.

---

## 📁 Struktur Proyek

```text
simulasi_PBO_SunuSetyoJati/
│
├── koneksi/
│   └── database.php             # Kelas koneksi database via PDO
│
├── database.sql                 # Dump/Export file basis data MySQL
├── Pendaftaran.php             # Abstract Class induk
├── PendaftaranReguler.php      # Subclass Jalur Reguler
├── PendaftaranPrestasi.php     # Subclass Jalur Prestasi
├── PendaftaranKedinasan.php    # Subclass Jalur Kedinasan
├── index.php                    # View Utama (Modern Dashboard & Router Tab)
└── README.md                    # Dokumentasi Proyek