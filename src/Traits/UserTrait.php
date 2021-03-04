<?php
namespace ZrFlorent\Altamrolespermisosdevel\Traits;


trait UserTrait{

public function roles(){
    
    return $this->belongsToMany('ZrFlorent\Altamrolespermisosdevel\Models\Role')->withTimesTamps();
   // return $this->belongsToMany(ZrFlorent\Altamrolespermisosdevel\Models\Role::class)->withTimestamps();

}  
public function havePermission($permission){

    foreach ($this->roles as $role) {
        # code...
        if ($role['full-access']=='yes') {
            # code...
            return true ;
        }

            foreach ($role->permissions as $perm) {
                # code...
                if ($perm->slug == $permission) {
                    # code...
                    return true;
                }
            }
               
    }
return false;
   // return $this->roles;;

}
}