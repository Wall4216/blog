<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создание обычного пользователя
        \App\Models\User::create([
            'name' => 'Обычный пользователь',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false, // Здесь указывается false для обычного пользователя
        ]);

        // Создание администратора
        \App\Models\User::create([
            'name' => 'Администратор',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true, // Здесь указывается true для администратора
        ]);
    }
}
