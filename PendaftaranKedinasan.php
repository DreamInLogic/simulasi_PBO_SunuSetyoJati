<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik Kedinasan
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $sk_ikatan_dinas, $instansi_sponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->sk_ikatan_dinas = $sk_ikatan_dinas;
        $this->instansi_sponsor = $instansi_sponsor;
    }

    // Getter untuk atribut spesifik
    public function getSkIkatanDinas() { return $this->sk_ikatan_dinas; }
    public function getInstansiSponsor() { return $this->instansi_sponsor; }

    // [Tahap 5] Overriding: Total Biaya = Biaya Dasar * 1.25 (Surcharge administrasi 25%)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar * 1.25;
    }

    // Implementasi menampilkan informasi unik jalur
    public function tampilkanInfoJalur() {
        return "SK: " . $this->sk_ikatan_dinas . " | Sponsor: " . $this->instansi_sponsor;
    }

    // [Tahap 4] Metode Query Spesifik menggunakan PDO
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $list = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new PendaftaranKedinasan(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }
        return $list;
    }
}
?>