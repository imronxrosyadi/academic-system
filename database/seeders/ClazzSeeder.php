<?php

namespace Database\Seeders;

use App\Models\Clazz;
use App\Service\EncryptService;
use Illuminate\Database\Seeder;

class ClazzSeeder extends Seeder
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
        Clazz::create(
            [
                'name' => $this->getEncryptService()->injectEnc('A'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Clazz::create(
            [
                'name' => $this->getEncryptService()->injectEnc('B'),
                'semester' => $this->getEncryptService()->injectEnc('1')
            ]
        );

        Clazz::create(
            [
                'name' => $this->getEncryptService()->injectEnc('A'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );

        Clazz::create(
            [
                'name' => $this->getEncryptService()->injectEnc('B'),
                'semester' => $this->getEncryptService()->injectEnc('2')
            ]
        );
    }
}
