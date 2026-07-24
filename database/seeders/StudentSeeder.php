<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student::insert([
        //     [
        //         'name' => 'ehud',
        //         'email' => 'simanjuntak@gmail.com',
        //         'phone' => '08881234',
        //         'address' => 'Jakarta',
        //     ],
        //     [
        //         'name' => 'ehud',
        //         'email' => 'simanjuntak@gmail.com',
        //         'phone' => '08881234',
        //         'address' => 'Jakarta',
        //     ],
        // ]);

        Student::factory(50)->create();
    }
}
