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

  public function getFullName()
  {
    if (!$this->first_name || !$this->last_name){
      return null;
    }

    return "{$this->first_name} {$this->last_name}";
  }

  public function getFullNameOrUsername()
  {
    return $this->getFullName() ?: $this->username;
  }
}
