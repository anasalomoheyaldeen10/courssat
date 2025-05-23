<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'أنس المحي الدين',
            'email'=>'anasalmoheyaldeen@gmail.com',
            'password'=>Hash::make('12345678'),
            'gender'=>'ذكر',
            'country'=>'سوريا',
            'photo'=>'صورة',
            'phone'=>'0935220960',

        ]);
        User::create([
            'name'=>' محمد شاهين',
            'email'=>'mohammad@gmail.com',
            'password'=>Hash::make('12345678'),
            'gender'=>'ذكر',
            'country'=>'سوريا',
            'photo'=>'صورة',
            'phone'=>'0965341098',

        ]);
        User::create([
            'name'=>'حسين أحمد',
            'email'=>'hussain@gmail.com',
            'password'=>Hash::make('12345678'),
            'gender'=>'ذكر',
            'country'=>'سوريا',
            'photo'=>'صورة',
            'phone'=>'09067307810',

        ]);
    }
}
