<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
    }
}
