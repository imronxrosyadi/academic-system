<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Service\EncryptService;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
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
        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1205100101'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567890'),
                'full_name' => $this->getEncryptService()->injectEnc('Ahmad Syah'),
                'nickname' => $this->getEncryptService()->injectEnc('Ahmad'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-02-10'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Merdeka No. 10, Tangerang Selatan'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1205100102'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567891'),
                'full_name' => $this->getEncryptService()->injectEnc('Muhammad Ali'),
                'nickname' => $this->getEncryptService()->injectEnc('Ali'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-05-05'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Raya Ciledug No. 25, Kota Tangerang'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1205100103'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567892'),
                'full_name' => $this->getEncryptService()->injectEnc('Rizky Pratama'),
                'nickname' => $this->getEncryptService()->injectEnc('Rizky'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-07-20'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Harapan Indah No. 15, Tangerang Selatan'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1205100104'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567893'),
                'full_name' => $this->getEncryptService()->injectEnc('Fikri Maulana'),
                'nickname' => $this->getEncryptService()->injectEnc('Fikri'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-04-15'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Serpong Indah No. 8, Tangerang Selatan'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010105'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567894'),
                'full_name' => $this->getEncryptService()->injectEnc('Miftahul Huda'),
                'nickname' => $this->getEncryptService()->injectEnc('Miftahul'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-03-03'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.16, Rt.004, Rw.007'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010106'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567895'),
                'full_name' => $this->getEncryptService()->injectEnc('Aziz Alfariz'),
                'nickname' => $this->getEncryptService()->injectEnc('Aziz'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-06-25'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.87, Rt.009, Rw.001'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010107'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567896'),
                'full_name' => $this->getEncryptService()->injectEnc('Fauzan Hakim'),
                'nickname' => $this->getEncryptService()->injectEnc('Fauzan'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Bekasi'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-10-12'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.67, Rt.006, Rw.003'),
                'class_id' => '1'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010108'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567897'),
                'full_name' => $this->getEncryptService()->injectEnc('Zainul Abidin'),
                'nickname' => $this->getEncryptService()->injectEnc('Zainul'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-01-18'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.108, Rt.005, Rw.004'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010109'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567898'),
                'full_name' => $this->getEncryptService()->injectEnc('Rifqi Ramadhan'),
                'nickname' => $this->getEncryptService()->injectEnc('Rifqi'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Depok'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-08-07'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.105, Rt.004, Rw.004'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010110'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567899'),
                'full_name' => $this->getEncryptService()->injectEnc('Ilham Nurhadi'),
                'nickname' => $this->getEncryptService()->injectEnc('Ilham'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-11-22'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.106, Rt.004, Rw.004'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010111'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567900'),
                'full_name' => $this->getEncryptService()->injectEnc('Muhammad Iqbal'),
                'nickname' => $this->getEncryptService()->injectEnc('Iqbal'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('DKI Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-05-11'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.108, Rt.002, Rw.009'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010111'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567901'),
                'full_name' => $this->getEncryptService()->injectEnc('Ahmad Fauzan'),
                'nickname' => $this->getEncryptService()->injectEnc('Fauzan'),
                'gender' => $this->getEncryptService()->injectEnc('Laki-laki'),
                'birth_place' => $this->getEncryptService()->injectEnc('Bogor'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-09-30'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.7, Rt.002, Rw.005'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010113'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567902'),
                'full_name' => $this->getEncryptService()->injectEnc('Aisyah Nurul'),
                'nickname' => $this->getEncryptService()->injectEnc('Aisyah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-02-09'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.4, Rt.004, Rw.005'),
                'class_id' => '2'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010114'),
                'nisn' => $this->getEncryptService()->injectEnc('12345678903'),
                'full_name' => $this->getEncryptService()->injectEnc('Fatimah Zahra'),
                'nickname' => $this->getEncryptService()->injectEnc('Fatimah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-07-05'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.76, Rt.001, Rw.003'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010115'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567904'),
                'full_name' => $this->getEncryptService()->injectEnc('Siti Aisyah'),
                'nickname' => $this->getEncryptService()->injectEnc('Siti'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('DKI Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-04-20'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.5, Rt.003, Rw.002'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010116'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567905'),
                'full_name' => $this->getEncryptService()->injectEnc('Rania Putri'),
                'nickname' => $this->getEncryptService()->injectEnc('Rania'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-08-15'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.24, Rt.004, Rw.004'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010117'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567906'),
                'full_name' => $this->getEncryptService()->injectEnc('Marwah Khadijah'),
                'nickname' => $this->getEncryptService()->injectEnc('Marwah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('DKI Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-11-10'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.99, Rt.006, Rw.004'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010118'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567907'),
                'full_name' => $this->getEncryptService()->injectEnc('Salsabila Zahira'),
                'nickname' => $this->getEncryptService()->injectEnc('Salsabila'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-01-03'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.28, Rt.007, Rw.001'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010119'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567908'),
                'full_name' => $this->getEncryptService()->injectEnc('Sarah Azizah'),
                'nickname' => $this->getEncryptService()->injectEnc('Sarah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Bekasi'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-03-28'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.66, Rt.004, Rw.006'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010120'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567909'),
                'full_name' => $this->getEncryptService()->injectEnc('Ayu Firtiani'),
                'nickname' => $this->getEncryptService()->injectEnc('Ayu'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('DKI Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-10-08'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Timur No.74, Rt.001, Rw.009'),
                'class_id' => '3'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010121'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567910'),
                'full_name' => $this->getEncryptService()->injectEnc('Aulia Zahira'),
                'nickname' => $this->getEncryptService()->injectEnc('Aulia'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Bogor'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-03-12'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.91, Rt.004, Rw.004'),
                'class_id' => '4'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010122'),
                'nisn' => $this->getEncryptService()->injectEnc('1234567911'),
                'full_name' => $this->getEncryptService()->injectEnc('Nurul Hikmah'),
                'nickname' => $this->getEncryptService()->injectEnc('Nurul'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2016-02-05'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.51, Rt.006, Rw.004'),
                'class_id' => '4'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010123'),
                'nisn' => $this->getEncryptService()->injectEnc('12345678912'),
                'full_name' => $this->getEncryptService()->injectEnc('Aisyah Zahra'),
                'nickname' => $this->getEncryptService()->injectEnc('Aisyah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-08-10'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.23 Rt.004, Rw.007'),
                'class_id' => '4'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010124'),
                'nisn' => $this->getEncryptService()->injectEnc('12345678913'),
                'full_name' => $this->getEncryptService()->injectEnc('Fatimah Nurul'),
                'nickname' => $this->getEncryptService()->injectEnc('Fatimah'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('DKI Jakarta'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-07-09'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.44 Rt.004, Rw.004'),
                'class_id' => '4'
            ]
        );

        Student::create(
            [
                'id_number' => $this->getEncryptService()->injectEnc('1201010125'),
                'nisn' => $this->getEncryptService()->injectEnc('12345678914'),
                'full_name' => $this->getEncryptService()->injectEnc('Rania Salsabila'),
                'nickname' => $this->getEncryptService()->injectEnc('Rania'),
                'gender' => $this->getEncryptService()->injectEnc('Perempuan'),
                'birth_place' => $this->getEncryptService()->injectEnc('Tangerang Selatan'),
                'birth_date' => $this->getEncryptService()->injectEnc('2017-05-12'),
                'religion' => $this->getEncryptService()->injectEnc('Islam'),
                'phone_number' => $this->getEncryptService()->injectEnc('-'),
                'address' => $this->getEncryptService()->injectEnc('Jl. Pondok Kacang Prima No.45, Rt.004, Rw.004'),
                'class_id' => '4'
            ]
        );
    }
}
