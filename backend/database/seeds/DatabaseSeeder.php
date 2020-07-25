<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        /*$descripcion_1 = `<h3 class="ql-align-center"><strong> En este tutorial aprenderemos a utilizar "Modals" la clase que nos brinda Materialize. </strong></h3><p class="ql-align-justify"><br></p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>Materialize</strong> Nos brinda una manera de hacer que el usuario que este en nuestra página se concentre en lo que queremos, Como por ejemplo, Puede estar leyendo un documento PDF, pero el modal bloquea toda la pagina y le muestra el PDF para que no haya ninguna interrupción, Tal vez sea un poco dificil entender pero cuando lo vean, sabran de lo que les estoy explicando.</p><p class="ql-align-justify">Lo primero que debemos hacer es insertar la <strong>CDN</strong> de Materialize, para tener todo su estilo y su js sin tenerlo en una carpeta, los <strong>CDN</strong> los podemos encontrar <a href="http://materializecss.com/getting-started.html" rel="noopener noreferrer" target="_blank">Aqui</a> o Abajo en nuestro codigo.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><br></p><pre class="ql-syntax" spellcheck="false">  &lt;!-- Compiled and minified CSS --&gt;&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"&gt;&lt;!-- Compiled and minified JavaScript --&gt;&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"&gt;&lt;/script&gt;</pre><p><br></p><p>Ya insertado nuestro <strong>CDN</strong> Empezaremos colocando las clases en la parte <strong>HTML/</strong> Como regla, primero hacemos las vistas, Luego hacemos las funciones, asi tendremos todo mas ordenado y de mejor manera.</p><p><br></p><pre class="ql-syntax" spellcheck="false"> &lt;!-- Compiled and minified CSS --&gt;&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"&gt;&lt;!-- Compiled and minified JavaScript --&gt;&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"&gt;&lt;/script&gt;&lt;nav class="blue accent-4"&gt;&lt;div class="nav-wrapper"&gt;&lt;a href="#" class="brand-logo center"&gt;Logo&lt;/a&gt;&lt;ul id="nav-mobile" class="left hide-on-med-and-down"&gt;&lt;li&gt;&lt;a href="sass.html"&gt;Sass&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="badges.html"&gt;Components&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="collapsible.html"&gt;JavaScript&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;/nav&gt;&lt;br&gt;&lt;br&gt;&lt;div class="container center"&gt;&lt;a class="waves-effect blue accent-4 btn" href="#modal1"&gt;Documento DevInter&lt;/a&gt;&lt;/div&gt;</pre><p><br></p><p class="ql-align-justify">Empecé Poniendo un menú y un boton para hacer funcionar nuestro modals, el menu no era necesario pero para que se viera bien pues lo puse, el modals puede ser ejecutado de varias formas, pero nosotros por ahora aprenderemos a hacerlo con un botón.</p><p class="ql-align-justify">Ahora procedemos a colocar nuestro modals, empezamos colocando <code>div id="modal1" class="modal"</code> Que nos dice que, en la clase <code>modal</code> hay una serie de estilos que se ejecutaran al llamarlos por el identificador <code>modal1</code></p><p class="ql-align-justify">El <code>H4</code> y el <code>P</code> Que estan allí, serán nuestro relleno de documento, Ya lo cambiaremos pero primero explicare la estructura del modals.</p><p><br></p><pre class="ql-syntax" spellcheck="false">  &lt;!-- Compiled and minified CSS --&gt;&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"&gt;&lt;!-- Compiled and minified JavaScript --&gt;&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"&gt;&lt;/script&gt;&lt;nav class="blue accent-4"&gt;&lt;div class="nav-wrapper"&gt;&lt;a href="#" class="brand-logo center"&gt;Logo&lt;/a&gt;&lt;ul id="nav-mobile" class="left hide-on-med-and-down"&gt;&lt;li&gt;&lt;a href="sass.html"&gt;Sass&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="badges.html"&gt;Components&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="collapsible.html"&gt;JavaScript&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;/nav&gt;&lt;br&gt;&lt;br&gt;&lt;div class="container center"&gt;&lt;a class="waves-effect blue accent-4 btn" href="#modal1"&gt;Documento DevInter&lt;/a&gt;&lt;/div&gt;&lt;div id="modal1" class="modal"&gt;&lt;div class="modal-content"&gt;&lt;h4&gt;Modal Header&lt;/h4&gt;&lt;p&gt;A bunch of text&lt;/p&gt;&lt;/div&gt;&lt;div class="modal-footer"&gt;&lt;a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"&gt;Agree&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;</pre><p class="ql-align-justify">El <code>div class="modal-footer"</code> que tenemos alli, es el footer de nuestro documento, Ahi podriamos poner un Aceptar, Agregar, Declinar, Si es un login podriamos poner un Login, Register, Olvide mi contraseña, y Muchisimas cosas mas, Pero como solo es un documento, Pondre Aceptar.</p><p class="ql-align-justify">Y Finalmente nuestro Aceptar <code>a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"&gt;Aceptar</code>.</p><p><br></p><pre class="ql-syntax" spellcheck="false">  &lt;!-- Compiled and minified CSS --&gt;&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"&gt;&lt;!-- Compiled and minified JavaScript --&gt;&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"&gt;&lt;/script&gt;&lt;nav class="blue accent-4"&gt;&lt;div class="nav-wrapper"&gt;&lt;a href="#" class="brand-logo center"&gt;Logo&lt;/a&gt;&lt;ul id="nav-mobile" class="left hide-on-med-and-down"&gt;&lt;li&gt;&lt;a href="sass.html"&gt;Sass&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="badges.html"&gt;Components&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href="collapsible.html"&gt;JavaScript&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;/nav&gt;&lt;br&gt;&lt;br&gt;&lt;div class="container center"&gt;&lt;a class="waves-effect blue accent-4 btn" href="#modal1"&gt;Documento DevInter&lt;/a&gt;&lt;/div&gt;&lt;div id="modal1" class="modal"&gt;&lt;div class="modal-content"&gt;&lt;h4 class="center"&gt;Documento DevInter&lt;/h4&gt;&lt;p&gt;Este documento se refiere, que esta es una buena pagina de turoriales para paginas web, cualquier pregunta qeu usted tenga la puede escribir abajo en los comentarios y sera respondido lo mas rapido posible, Muchas gracias por su lectura!&lt;/p&gt;&lt;/div&gt;&lt;div class="modal-footer"&gt;&lt;a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"&gt;Aceptar&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;</pre><p><br></p><p class="ql-align-justify">Cambiamos algunos detalles a mi gusto, Y procedemos a colocar nuestro funcionamiento, lo que le va a dar vida a nuestro modals. El <strong>Javascript.</strong></p><p class="ql-align-justify">El Javascript nos lo indica claramente Materialize como ponerlo, estan facil como copiar y pegar y que concuerde el identificador del boton con el ejecutador que ponemos en el script, A continuación veremos cual es el script de los modals.</p><p><br></p><p><br></p><pre class="ql-syntax" spellcheck="false">        $(document).ready(function(){// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered$('.modal').modal();});</pre><p><br></p><p>En ese codigo, la primera linea nos dice que, la parte script de la pagina esta preparada para ser ejecutada, la tercera linea nos dice que, cuando apretamos el boton con clase <strong>modal</strong> se nos estarian ejecutando una serie de clases y estilos que nos crea y nos hace en nuestra pagina el MODAL. Y asi de fácil sería todo, Ahora para ser una prueba mas concreta me apartare de codepen y lo hare en esta misma pagina, Porfavor si quieres probar dale click al botón de aca abajo.</p><p><br></p><p class="ql-align-justify">Bueno chicos eso sería todo, si quieres ver como quedo este tutorial en su final tan solo dale click Aquí. </p><p class="ql-align-justify"><br></p><p class="ql-align-center"><strong>"Si deseas aprender más sobre MATERILIZE te recomiendo que te pases por nuestra sección de Cursos donde podras encontrar muchas cosas útiles con lo cual te podras ahorrar, Tiempo, Espacio y trabajo. Dale click  Aquí para ver nuestro catálogo de Cursos de MATERIALIZE." </strong></p><p><br></p>`;*/






















        
        //factory(\App\Rol::class, 1)->create(['name' => 'Administrador']);
        //factory(\App\Rol::class, 1)->create(['name' => 'Usuario']);

        $this->call(RoleTableSeeder::class);

        $this->call(UsuarioTableSeeder::class);

        $this->call(EntradaTableSeeder::class);

        /*factory(\App\User::class, 1)->create([
        	'name' => 'admin',
	        'email' => 'admin@mail.com',
	        'password' => bcrypt('secret'),
	        'role_id' => \App\Role::ADMIN,
            'email_verified_at' => now()
        ]);
	    factory(\App\User::class, 1)->create([
		    'name' => 'student',
		    'email' => 'student@mail.com',
		    'password' => bcrypt('secret'),
		    'role_id' => \App\Role::USER,
            'email_verified_at' => now()
	    ]);*/

	    //factory(\App\Entrada::class,5)->create();



    

        /*factory(\App\Entrada::class,1)->create([
            'user_id'=>\App\User::all()->random()->id,
            'titulo' => 'Tutorial de como utilizar los atributos para INPUT.',
            'descripcion'=> 'descripcion 1 aqui',
    'img_vista_previa' => 'code_php.jpeg',
    'img_vista_completa'=> 'code_php.jpeg',
    'tiempo_lectura' => '10 minutos'
                                    ]);*/


        /*factory(\App\Entrada::class,1)->create([
            'user_id'=>\App\User::all()->random()->id,
            'titulo' => 'Tutorial de Modals para concentración sobre información..',
            'descripcion'=> 'descripcion 2 aqui',
    'img_vista_previa' => 'code_php.jpeg',
    'img_vista_completa'=> 'code_php.jpeg',
    'tiempo_lectura' => '10 minutos'
                                    ]);*/






    }
}
