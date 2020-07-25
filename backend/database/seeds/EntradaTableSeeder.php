<?php

use App\Entrada;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EntradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->insert([
            'user_id' =>2,
            'titulo' => "Quae explicabo voluptas eum.",
            'descripcion' => "Modi aut qui nam consequatur. Ea necessitatibus numquam maiores et totam voluptatem at id.",
            'img_vista_previa' => "Rootear-Android.jpg",
            'img_vista_completa' => "Rootear-Android.jpg",
            'tiempo_lectura' => "5 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>1,
            'titulo' => "Sunt ut exercitationem sunt debitis in est eos molestiae.",
            'descripcion' => "Sunt ex beatae laborum ut id sequi. Possimus a sint ad porro omnis quibusdam. Est aliquam dolorem expedita assumenda iure. Laborum et qui omnis amet.",
            'img_vista_previa' => "Rootear-Android.jpg",
            'img_vista_completa' => "Rootear-Android.jpg",
            'tiempo_lectura' => "5 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>2,
            'titulo' => "Earum nihil officia quod sed tempora esse.",
            'descripcion' => "Et voluptatem delectus quas deserunt quasi qui et harum. Repudiandae sit laborum sapiente quisquam consectetur ut minima. Architecto magnam amet quod autem repellat.",
            'img_vista_previa' => "Rootear-Android.jpg",
            'img_vista_completa' => "Rootear-Android.jpg",
            'tiempo_lectura' => "5 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>1,
            'titulo' => "Harum nihil distinctio ea quaerat nihil tempore.",
            'descripcion' => "Non blanditiis porro architecto doloribus. Sunt beatae vel non ullam iusto corrupti corporis. Et ad assumenda voluptatem sit omnis.",
            'img_vista_previa' => "dota.jpg",
            'img_vista_completa' => "dota.jpg",
            'tiempo_lectura' => "5 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>2,
            'titulo' => "Nisi ut ipsum voluptas ab sit est accusamus ut.",
            'descripcion' => "Error aliquid quo cupiditate. Ea ratione est mollitia sunt. Modi laboriosam tempore et quia sapiente sint.",
            'img_vista_previa' => "code_php.jpeg",
            'img_vista_completa' => "code_php.jpeg",
            'tiempo_lectura' => "5 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>1,
            'titulo' => "Tutorial de como utilizar los atributos para INPUT.",
            'descripcion' => "descripcion 1 aqui",
            'img_vista_previa' => "code_php.jpeg",
            'img_vista_completa' => "code_php.jpeg",
            'tiempo_lectura' => "10 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('entradas')->insert([
            'user_id' =>2,
            'titulo' => "Tutorial de Modals para concentración sobre información..",
            'descripcion' => "descripcion 2 aqui",
            'img_vista_previa' => "code_php.jpeg",
            'img_vista_completa' => "code_php.jpeg",
            'tiempo_lectura' => "10 minutos",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
    }
}
