<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Optio voluptatem fugiat nihil amet aliquam aut.';
        $role->save();

        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'Aspernatur odio architecto quis velit sapiente sed libero.';
        $role->save();
    }
}
