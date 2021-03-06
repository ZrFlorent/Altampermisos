# Altampermisos


Paquete con manejo de roles y permisos para laravel 8 



## Descarga el paquete roles y permisos para laravel 8

Comando que descargará e instalará en Laravel 7 con la ejecución del siguiente comando: 

```bash
composer require ZrFlorent/Altamrolespermisosdevel
```

## Instalación

Ejecute en el terminal el siguiente comando:

```bash
composer require ZrFlorent/Altamrolespermisosdevel
```


## Requisitos

**El paquete de Laravel/ui debe estar instalado en Laravel para que funcione correctamente este paquete.**

## Uso del paquete

Una vez instalado el paquete en laravel 8, es recomendable utilizar el siguiente comando para exportar las migraciones, archivo seeder, vistas, políticas y mucho más:

```bash
php artisan vendor:publish --provider="ZrFlorent\Altamrolespermisosdevel\JhonatanPermisosServiceProvider"

```

Luego de haber ejecutado el comando anterior, vamos a revisar en la instalación de laravel el siguiente archivo **config/Altampermisos.php** 

```php
return [
  'RouteRole' => 'role',
  'RouteUser' => 'user',
  'IdRoleDefault' => 2
];
```
En este, podremos cambiar las urls que vienen por defecto tanto para acceder a los roles como para los usuarios. Por otro lado, podremos también cambiar cual será el id del rol por defecto que se asignará cuando se registre un usuario.   


Si luego de realizar los cambios en el archivo de configuración, no se reflejan, entonces debe ejecutar el siguiente comando en el terminal:

```bash
php artisan config:clear
```

Antes de ejecutar el comando 
```bash
php artisan migrate
```
recomendamos realizar la siguiente configuración en el modelo User:

```php

use Illuminate\Foundation\Auth\User as Authenticatable;

//agregamos este trait
use ZrFlorent\Altamrolespermisosdevel\Traits\UserTrait; 

class User extends Authenticatable
{
	//usamos el trait
    use UserTrait;

    // ...
}

```


Debemos revisar el archivo seed AltamPermissionInfoSeeder.php, exportado por el paquete en su instalación de laravel en la siguiente ruta: **database/seeds/AltamPermissionInfoSeeder.php**, ya que, en este, encontrarás lo siguiente: 

- La creación del usuario admin, con el correo admin@admin.com. El usuario es **admin** y la contraseña es: **admin**. 
- Creación de dos roles: Rol Admin y Rol Autenticated User.
- Creación de la relación del rol Admin y el usuario admin.
- Creación de los permisos por defecto.

Un ejemplo de lo que encontrarás en el archivo antes mencionado para la creación de permisos es la siguiente:



```php

		//permission role
        $permission = Permission::create([
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'A user can list role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'A user can see role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'A user can create role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'A user can edit role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'A user can destroy role',
        ]);

        $permission_all[] = $permission->id;

```


Una vez tengas todos los permisos que necesitas, debes modificar el archivo **DatabaseSeeder.php** para cargar el seeder. 

Adjunto un ejemplo de como debe quedar este archivo:

```php

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
        //$this->call(UsersTableSeeder::class);
        $this->call(AltamPermissionInfoSeeder::class);
    }
}


```

Ahora si podremos ejecutar el siguiente comando en el terminal

```bash
php artisan migrate --seed

```
Una vez cargadas todas las tablas a tu base de datos con todos los permisos de lugar, ya podrás acceder a la url /role para acceder a los roles y /user para los usuarios.

## License
[MIT](./LICENSE.md)
