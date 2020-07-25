<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_limitado = Role::where('nombre', 'Usuario')->first();
        $role_admin = Role::where('nombre', 'Administrador')->first();

        $user = new User();
        $user->nombre = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('secret96');
        $user->imagen_perfil = 'CCS3.jpg';
        $user->email_verified_at = Carbon::now();
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->nombre = "student";
        $user->email = "student@mail.com";
        $user->password = bcrypt('student');
        $user->imagen_perfil = 'html5.jpg';
        $user->email_verified_at = Carbon::now();
        $user->save();
        $user->roles()->attach($role_limitado);
    }
}
