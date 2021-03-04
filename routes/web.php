<?php

use Illuminate\Support\Facades\Route;
use ZrFlorent\Altamrolespermisosdevel\Http\Controllers\RoleController;
use ZrFlorent\Altamrolespermisosdevel\Http\Controllers\UserController;

Route::resource(config('Altampermisos.RouteRole'), RoleController::class)->names('role')->middleware(['web']);
Route::resource(config('Altampermisos.RouteUser'), UserController::class, ['except'=>[
  'create','store'
]])->names('user')->middleware(['web']);


/* [UserController::class] */

//Route::resource('user', [ZrFlorent\Altamrolespermisosdevel\Models\Http\Controllers\RoleController::class]);

