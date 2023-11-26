<?php

namespace Database\Seeders;

use App\Models\SubjectGrade;
use Illuminate\Database\Seeder;

class SubjectGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectGrade::create([
            'code' => 'MT1',
            'name' => 'Matpel1'
        ]);
    }
}
