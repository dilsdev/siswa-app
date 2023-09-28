<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'name' => 'X RPL 1',
                'slug' => 'x-rpl-1',
            ],
            [
                'name' => 'X RPL 2',
                'slug' => 'x-rpl-2',
            ],
            [
                'name' => 'X RPL 3',
                'slug' => 'x-rpl-3',
            ],
        ];

        foreach ($classes as $studentClass) {
            $class = new StudentClass();
            $class->name = $studentClass['name'];
            $class->slug = $studentClass['slug'];
            $class->save();
        }
    }
}
