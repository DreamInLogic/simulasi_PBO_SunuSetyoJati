<?php
// File: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik Reguler
    private $pilihan_prodi;
    private $lokasi_kampus;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $pilihan_prodi, $lokasi_kampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->pilihan_prodi = $pilihan_prodi;
        $this->lokasi_kampus = $lokasi_kampus;
    }

    // Getter untuk atribut spesifik
    public function getPilihanProdi() { return $this->pilihan_prodi; }
    public function getLokasiKampus() { return $this->lokasi_kampus; }

    // [Tahap 5] Overriding: Total Biaya = Biaya Dasar (Tanpa potongan/surcharge)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar;
    }

    // Implementasi menampilkan informasi unik jalur
    public function tampilkanInfoJalur() {
        return "Prodi: " . $this->pilihan_prodi . " | Kampus: " . $this->lokasi_kampus;
    }

    // [Tahap 4] Metode Query Spesifik menggunakan PDO
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $list = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new PendaftaranReguler(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }
        return $list;
    }
}
?>