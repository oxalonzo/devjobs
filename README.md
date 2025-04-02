<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## breeze 

es un paquete de laravel para la autenticacion de nuestra aplicacion

incluye las funciones de crear cuenta, autenticar password, resetear password, connfirmar cuenta y verificar email

esta hecho con blae y tailwing css

entonces nos va a agregar todo los controladores las vista, va registrarlo en la base de datos

en laravel ademas de breeze exite otros paquetes para autenticar usuarios 
cada uno para situaciones diferentes y especificas pero que al principio puede ser algo confuso cual implementar


los otros paquetes son fortify, sanctum, jetstream

fortify:

es un paquete de autenticacion para el frontend que utiliza toda la implementacion del backend de laravel o sea tienes todo el backendd  hecho con laravel y implementas e el frontennd el paquete de fortify

una  de sus caracteristicas importante es la autenticacion de doos 2 factores es decir inicias sessionn con usuario y password y despues envia un coigo sms a tu celular y puedes colocar ese codigo para iniciar session esa parte de los envio de los sms usualmente tiene un costo por ejemplo con twilio que es muy comun para eso te permite tener hasta cierta cantidad de mensajes gratis

fortify a diferencia de breeze no inncluye interfas de usuario tienes que construirla tu, tu tienes que elaborar toodos los campos hacer ciertos parametroos y enviar unicamente ciertos para metros al backend de laravel a diferencia de breeze que si tienne interfas de usuario, breeze te va a creaar muchaas rutas, muchos metodos de http que vas a portar, fortify trabaja o funciona sobre esos metodos o sobre la instalacion dde breeze entonces si quieres utilizar fortify tienes que tener instaladod breeze

sanctum:

sanctum esta diseñado para ser utilizado como metodo de autenticacion para aplicaciones de una sola pagina los SPA que son construido con angular, con vue, coon next.js, nuxt o react

al igual que fortify  tambien utiliza los endpoint de breeze, pero añade nuevos endpoint para almacenar y generar tokens que permitan el acceso al backend de laravel

utiliza tambien breeze pero tambien puede ser utilizado junto a fortify puedes crear una tienda virtual en laravel y puedes  tener el frontend hecho en next.js y una aplicacion movil hecha flutter y con estos tres junto vas a poder tener toda la parte de la autenticacion de los usuarios

jetstream:

es una interfaz completa ideal para ser utilizada como el inicio de una aplicacion completa de laravel

esta diseñada con tailwind css y puede ser utilizada junto a inertia o livewire

algo importante es que breeze utiliza blade pero en el caso de jetstream utiliza inertia o livewire como vimos livewire es un codigo hecho en vue.js y php y en el caso de inertia puedes tener tu codigo en react o en vue.js te daria esa funcionalidad

se comporta similar porque jetstream utiliza sanctum que como vimos anteriormente se utiliza en single page application o SPA como son sus siglas pero tambien tiene toddaas las funciones de breeze como es el registro, login, autenticacin de dos factores y como esta separado backend de frontend tambien tiene acceso a sesiones, tokens, otras areas como verificacion de email y reseteo de password



## descargar breeze

sail composer require laravel/breeze --dev

## como instalar breeze 

sail artisan breeze:install

sail npm install

## para poner a correr los paquetes 

npm run dev


si pones sail artisan route:list te mostrara las rutas ya creada por breeze para todas las cosa que hace en su validacion si es login, logout, etc


## pasos 

vista
controlador
modelo

## pasos para crea una columan en la tabla 

creas la migracion recuerdaa que si lo especificas en inngles el nombre de la migration laravel tiene fuertes conveciones
ejemplo: add_rol_to_users

despues dentro la migracion escribes el codigoo y indica el tipo de dato que sera la columna y indica el droptable si haces un rollback

despues ejecutas la migracion 
despues agregas en el modelo de la tabla la columna extra en el fillabel

y ya cuando el dato pase de la vista a el controlador y las validaciones y se vaya a crear llegara a el modelo y estara la columan extra para guardarlo

## pasos para crear una vista

creas la vista 
creas la ruta con los estandare de laravel 
ejemplo: Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');

despues en el controlador con el metodo de creaate pones el codigo para la validaacion y la creacion 

y cuando pase la validacion y creacion va al modelo para guardar mediante los fillabel y redirige a la ruta que lo mandes


##  paso para el formulario mediante livewire

se insstala livewire en el prooyecto sail composer require livewire/livewire

se crea el componente de livewire 
ejemplo
sail artisan make:livewire CrearVacante

te crea dos docuemnto uno la vista que esta dentro de view/livewire/nombredelcomponente y el otro la logica y que renderisa que esta en app/http/livewire/nombredelcomponentepartelogica

despues se pone en la vista general que se utiliza en cada una de las otras vista el codigo del css y script de livewire 
ejemplo 

@livewireStyles
@livewireScripts

despues entras a la vista del componennte que esta en view/livewire y ahi puedes poner el html
y el en el app/http/livewire pondras la logica para llevar los datos o mandar los datos a tu decision


## pasos para crear un seeder 
un seeder en una base de datos es agregar datos que no van a ser dinamicos ejemplo las categorias

Los seeders te permiten definir datos de prueba en código y ejecutarlos de manera automatizada, lo que facilita el proceso de llenado de datos en la base de datos.

entras a la termial y escribes sail artisan make:seeder nombredelseeder

y se crea en 

ejemplo de un seeder lo que va dentro del metodo run 

        DB::table('salarios')->insert([
            'salario' => '$0 - $499',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        

## pasos para traer los salario y las categorias desde la base de datos 

primero se crea el seeder que insertara los datos en la tabla de salario y tambien categoria 
como el ejemplo annteriormente visto

despues se crea la migration para crear la tabla
se ejecuta la migracion para crear la tabla pero recuerda que tienes que agregar la coolumna de salario antes de ejecutarla 

antes de ejecutar el seeder que no se te olvide dejarle saber al archivo databaseseeder que el seeder que acabas de crear y vas a ejecutar existe

ejemplo  $this->call(SalarioSeeder::class);

despues ejecuta el seeder con el siguiente comando 
comando: sail artisan db:seed 

y despues de inserta los datos en la tabla especificada

despues para entoonces consultar la base de datos y pasar los datos a la vista se necesita un modelo asi que creamos un modelo 

sail artisan make:model Salario

despues en el componente que maneja la logica del componente creado con livewire se utiliza orm eloquent despues que este hecho el modelo para poder utilizar los metodos de orm eloquent 

en este caso se utilizo 

$salarios = Salario::all(); 

se trae todos los valores de la tabla salario 

y simplemente donde esta la vista renderizada se le paasa la variable para qu ela vista pueda utilizar el valor 

## publicar un paquete en laravel 

es sacarlo del core de laravel o su carpeta para poder ponerlo en otro lugar que sea publico para editarlo mas a fondo 

aqui esta publicando el paquete de pagination de laravel si es otro paquete cambias paginatio por el nombre del otro
comando para publicar un paquete 
saail artisan vendor:publish --tag=laravel-pagination

en este caso cuando se termine la publicacion todo se encontrara en resource/view/vendor/nombrede la carpeta del paquete publicado 

y ahi estarian los archivos para modificaarlos


## los lifecycle o ciclo de vida

ejemplo mount es un metodo quue se ejecuta una sola vez cada vez que es instanciado el componente


## crea un link simbolico que es lo que se esta haciendo en editar-vacante para que se pueda ver la imagen actual ya que el usuario no tiene permiso a la carpeta store donde se guaardan las imagen 

comando para crear un link simbolico en laa terminal

sail artisan storage:link

esto lanza The public/storage link has been connected to storage/app/public.  

## haciendno u policie o politica de laravel para que el formularioo de ediccion solo lo pueda ver la persona que lo publico 

aqui un ejemplo de la creacion de un policy que esta siendo asociado al modelo de vacantes

ejemplo:

sail artisan make:policy VacantePolicy --model=Vacante 

se genera dentro de app a carpeta policies con el policy creado adentro


## tres forma de moostrar eventos en livewire 

uno es desde la vista es de decir ejemplo desde mostrar-vacantes.blade.php
dos esta es desde el componente mostrar-vacante.php
tercera es desde javascript es decir desde el codigo javascript que se escribe

## para crear un moodelo al momento que creas en controller 

comando:

esos de --model= lo que esta haciendo es relacionandolo que cuando noo exite el modelo al momento de relacionarlo lo crea automaticamente

sail artisan make:controller CandidatoController --model=candidato



## las notificaciones en laravel 

como se crean y el tipo de notificaciones que se pueden realizar en nnuestras aplicaciones

las notificaciones te permitiran saber cuando un evento oocurre en tu aplicacion 

ejemplo: una nueva venta, un nuevo suscriptor, un mensaje de contacto son ejemplos de eventos que puedes añadir a tu notificaciones

estas notificaciones pueden ser enviada en diferentes formatos o puedenmoostrarse de diferentes formas ejemplo :

laravel soporta notificaciones en la pagina web, email o sms este ultimo son pagos

el comando para crear una notificacion en laravel 

es con: sail artisan make:notification Notificacion este ultimo e el nombre asignado a la notificacion

las nnotificaciones se almacenaan en app/notifications/nombredenotificacion

la funcion toDatabase

Almacena las notificaciones en la base de datos eso es lo que hace este metodo
como lo almacena en la base de datos hay que correr un par de comandos 
el primero es que cree esa tabla de notificaciones se crea la migracion con el siguiente comando sail artisan notifications:table
una vez creada la migracion se ejecuta con sail artisan migrate
ya teniendo la notificacion creada el sigueinte paso es decir a quien sera enviada la notificacion esto se hizo un ejemplo en el componente postularvacantes con la relaacion que se creo uno a uno de reclutador y asi pasando los datos a nuevocandidato


del componente se pasa la innformacion a el constructtor de la notificacion y despues dentro se le hace los arregos a la clase  




## creaando nuestro primerr middleware

comando para crearlo

sail artisan make:middleware nombredelmiddleware

despues en app/http/middleware/nombredelmiddleware ahi puedes acceder 

despues 

en la funcion handle escrribes tu codigo


despues le das a entender a laravel que exite en este caso si de manera global que quieres ejecutar el middleware 
vas a boostrap/app.php y lo escribes en la variable middleware el nombre del middleware creado con append

si es en una ruta en especifica que la quieres aplicar simplemente utilizas la funcion middleware  ejemplo 
'auth', 'verified', RolUsuario::class y el nombre del middleware lo importas y lo pones dentro de la funcion como si fuerra una clase aqui solo se aplicara justamente en esa ruta nada mas




        
## aplicacion monolitica 

los dos proyecto anteriores son lo que se conoce como aplicaciones monolitica eso significa que son apps monoliticas cuando tienen todos los archivos de backend, frontend, etc en una sola aplicacion todo opedado en un solo servidor a diferncia de la aplicacion que viene ahora que otra opcion es seprar backend y frontend por medio de una api

laravel ya tiene una herramienta para conectar con react se llama inertia es una buena opcion si deseas seguir escribiendo codigo al estilo de laravel pero con ciertas partes de react pero la mejor opcion es crear una API y separar el backend del frontend, de esta forma tendras total liberta para utilizar todas las herramientas de react que desees; incluyendo react native

en el caso del state puedes utilizar redux y context API 

algo importante es que en proyectos de react y laravel react sera la vista

el primer proyecto fue con blade 
el segundo fue mas con livewire 

Que son las API 

APPLICATION PROGRAMING INTERFACE

una api son una capa de atraccion para poder comunicar un backend con un frontend o una aplicacion movil 

una api puede estar hecha en cualquier lenguaje y siirven una respuesta en tiipo JSON que es un formato que se puede consumir en JS, REACT, VUE, ANGULAR, KOTLIN, SWIFT, SVELTE incluso otros frameworks

## ventajas de laravel y apis 

ventajas 

laravel puede ser utilizado como backend de tu api 

al hacerlo de esta forma obtendras todos los beneficios que laravel ofrece tales como eloquent y todo lo relacionado a la base de datos, autentiicacion, email, noootificaciones, etc todo esto se puede utilizar en laravel como api 

y todo esto puede ser utilizado con tu framework o libreria favoritos para crear SPA o Mobile Apps 



## ventajas react y apis 

react es uan libreria hecha por meta para crear single page applications y obtendra toda la inforrmacion de las apis 

react se ha convertido en la libreria JS mas popular en los ultimos años, e integrarlo por medio de una api con laravel te dara un gran control para crear aplicaciones seguras, rapidas y dinamicas




