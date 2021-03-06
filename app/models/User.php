<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

    protected $fillable = ['email', 'password', 'ocn', 'assignee', 'type', 'accesscode', 'verified'];

	protected $hidden = ['password', 'remember_token'];

}
