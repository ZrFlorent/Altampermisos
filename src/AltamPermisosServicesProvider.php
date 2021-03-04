<?php

namespace ZrFlorent\Altamrolespermisosdevel;
use Illuminate\Support\ServiceProvider;

class AltamPermisosServicesProvider extends ServiceProvider
{
    // Proyecto cliente ejecutar php artisan config:clear
    public function register(){
            $this->mergeConfigFrom(
                __DIR__.'/../config/Altampermisos.php', 'Altampermisos'
            );
    }
    public function boot(){

        
        
        //Cragar datos de las migraciones

        $this->loadMigrationsFrom([
            __DIR__.'/../database/migrations'
        ]);
        
        //Publicar migraciones
    
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'AltamPermisos-migrations');

        //publicar migraciones, luego de ejecutar los seed, debemos de realizar en la consola un : composer dump para evitar el error

        $this->publishes([
            __DIR__.'/../database/seeds' => database_path('seeders')
        ], 'AltamPermisos-seeders');

        $this->publishes([
            __DIR__.'/../Policies' => app_path('Policies')
        ], 'AltamPermisos-policies');

        $this->loadRoutesFrom(
            __DIR__.'/../routes/web.php'
        );
        $this->loadViewsFrom(
            __DIR__.'/../resources/views','Altamrp'
        );

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/Altamrp')
        ], 'AltamPermisos-views');

        $this->publishes([
            __DIR__.'/../config/Altampermisos.php' => config_path('Altampermisos.php')
        ], 'Altampermisos-config');

    }
}
