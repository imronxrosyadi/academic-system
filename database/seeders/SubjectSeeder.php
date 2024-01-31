<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Service\EncryptService;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    public $encrpytService;

    public function getEncryptService() {
        return $this->encrpytService = new EncryptService();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('1SDRS'),
                'name' => $this->getEncryptService()->injectEnc('DIRI SENDIRI (AKU DAN PANCA INDRA)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('1SLKU'),
                'name' => $this->getEncryptService()->injectEnc('LINGKUNGANKU (KELUARGAKU, RUMAHKU, DAN SEKOLAHKU)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('4'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('1SBTH'),
                'name' => $this->getEncryptService()->injectEnc('KEBUTUHANKU (MAKANAN, MINUMAN, PAKAIAN, KESEHATAN, KEBERSIHAN, dan KEAMANAN)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('4'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('1SBNT'),
                'name' => $this->getEncryptService()->injectEnc('BINATANG (PENGENALAN, PERILAKU, SIFAT, JENIS MAKANAN, DAN KEHIDUPANNYA)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('1STNM'),
                'name' => $this->getEncryptService()->injectEnc('TANAMAN (CINTA LINGKUNGAN, JENIS TANAMAN, BUAH-BUAHAN, DAN MANFAATNYA)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2SRKS'),
                'name' => $this->getEncryptService()->injectEnc('REKREASI (KENDARAAN, PESISIR, DAN PEGUNUNGAN)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('4'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2SPKP'),
                'name' => $this->getEncryptService()->injectEnc('PEKERJAAN/PROFESI'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2SAUA'),
                'name' => $this->getEncryptService()->injectEnc('AIR, UDARA, API'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('2'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2SAKM'),
                'name' => $this->getEncryptService()->injectEnc('ALAT KOMUNIKASI'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('2'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2STAK'),
                'name' => $this->getEncryptService()->injectEnc('TANAH AIR KU (NEGARAKU, KEHIDUPAN DI KOTA DAN DI DESA)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Subject::create(
            [
                'code' => $this->getEncryptService()->injectEnc('2SASM'),
                'name' => $this->getEncryptService()->injectEnc('ALAM SEMESTA (MATAHARI, BULAN, BINTANG, BUMI, LANGIT, DAN GEJALA ALAM)'),
                'time_allocation_in_week' => $this->getEncryptService()->injectEnc('3'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );
    }
}
