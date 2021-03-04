<?php

namespace ZrFlorent\Altamrolespermisosdevel\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];
    public function roles(){
        return $this->belongsToMany('ZrFlorent\Altamrolespermisosdevel\Models\Role')->withTimesTamps();

}
}
