<?php
// File: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik Prestasi
    private $jenis_prestasi;
    private $tingkat_prestasi;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $jenis_prestasi, $tingkat_prestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->jenis_prestasi = $jenis_prestasi;
        $this->tingkat_prestasi = $tingkat_prestasi;
    }

    // Getter untuk atribut spesifik
    public function getJenisPrestasi() { return $this->jenis_prestasi; }
    public function getTingkatPrestasi() { return $this->tingkat_prestasi; }

    // [Tahap 5] Overriding: Total Biaya = Biaya Dasar - Rp50.000 (Potongan apresiasi)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar - 50000;
    }

    // Implementasi menampilkan informasi unik jalur
    public function tampilkanInfoJalur() {
        return "Prestasi: " . $this->jenis_prestasi . " (" . $this->tingkat_prestasi . ")";
    }

    // [Tahap 4] Metode Query Spesifik menggunakan PDO
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $list = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new PendaftaranPrestasi(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }
        return $list;
    }
}
?>