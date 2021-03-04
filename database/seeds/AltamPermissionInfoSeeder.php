<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use ZrFlorent\Altamrolespermisosdevel\Models\Role;
use ZrFlorent\Altamrolespermisosdevel\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AltamPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        $useradmin = User::where('email','admin@admin.com')->first();

        if($useradmin){
            $useradmin->delete();
        }
       $useradmin = User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin')
       ]);
       
       $roleadmin = Role::create( [
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Administrator',
        'full-access' => 'yes'
    ]);     
          //Rol Registered user
          $roleuser = Role::create( [
            'name' => 'Registered user',
            'slug' => 'registereduser',
            'description' => 'Registered user',
            'full-access' => 'no'
        ]);   

        $useradmin->roles()->sync([$roleadmin->id]);





        $permission_all = [];
       
        

        $permission = Permission::create( [
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'A user can list role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'A user can see role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'A user can create role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'A user can Edit role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'A user can destroy role',
        ]);
        $permission_all[] = $permission->id;
        



        $permission = Permission::create( [
            'name' => 'List user',
            'slug' => 'user.index',
            'description' => 'A user can list user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'A user can see user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'A user can Edit user',
        ]);
        $permission_all[] = $permission->id;


        $permission = Permission::create( [
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'A user can destroy user',
        ]);
        
        $permission_all[] = $permission->id;






        //nuevo
        $permission = Permission::create( [
            'name' => 'Show owner user',
            'slug' => 'userowner.show',
            'description' => 'A user owner can see user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create( [
            'name' => 'Edit owner user',
            'slug' => 'userowner.edit',
            'description' => 'A user owner can Edit user',
        ]);
        $permission_all[] = $permission->id;

        /*$permission = Permission::create( [
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'A user can create role',
        ]); */
        
        $roleadmin ->permissions()->sync($permission_all);
/*         
 */
        
    }
}
