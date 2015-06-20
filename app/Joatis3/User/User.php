<?php

namespace Joatis3\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
  protected $table = 'users';

  /*
  $fillable restricts what columns can be upated by this model.
  */
  protected $fillable = [
    'email',
    'username',
    'password',
    'active',
    'active_hash',
    'remember_identifier',
    'remember_token',
  ];
}
