<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'code' => 'MT1',
            'name' => 'Matpel1',
            'time_allocation_in_week' => '3',
            'semester' => '1'
        ]);
    }
}
