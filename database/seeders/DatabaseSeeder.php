<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('_docentes')->insert([
        'nombre' => 'admin' ,
        'apellido' => 'admin' ,
        'correo' => 'admin@admin.com',
        'password' => Hash::make('admin')
       ]);
    }
}
