<?php

use Illuminate\Foundation\Inspiring;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('make:admin {email : The email address of the user}', function ($email) {
   $user = User::whereEmail($email)->firstOrFail();
   $user->assign('admin');
})->describe('Make the user with the specified email address an admin');
