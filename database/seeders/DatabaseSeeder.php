<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\students;
use App\Models\teacher;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data['name'] = 'Teacher A';
        $data['email'] = 'pdummy913@gmail.com';
        $data['password'] = Hash::make('12341234');
        $data['phone'] = '0303 8021430';

        teacher::create($data);

        $sdata['name'] = 'Stuedent B';
        $sdata['rollNumber'] = '197724';
        $sdata['password'] = Hash::make('12341234');

        students::create($sdata);
    }
}
