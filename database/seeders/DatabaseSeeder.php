<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //esto es para que se pueda ejecutar el seeder de salario en la tabla salarios de la base de datos 
        //y para que lo reconozca antes de ejecutar el comando del seeder y que se inserten los datos

        $this->call(SalarioSeeder::class);
        $this->call(CategoriasSeeder::class);

    }
}
