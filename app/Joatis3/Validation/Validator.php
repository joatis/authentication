<?php

namespace Joatis3\Validation;

use Violin\Violin;
use Joatis3\User\User;
/**
 *
 */
class Validator extends Violin
{
  protected $user;

  public function __construct(User $user)
  {
    $this->user = $user;

    $this->addFieldMessages([
      'email' => [
        'uniqueEmail' => 'That email is already in use.',
      ],
      'username' => [
        'uniqueUserName' => 'That username is already in use.',
        ]
      ]);
  }

  /*
  * Return FALSE if the count of users with that email is > 0
  */
  public function validate_uniqueEmail($value , $input, $args)
  {
    $user = $this->user->where('email', $value);

    return ! (bool) $user->count();
  }

  /*
  * Return FALSE if the count of users with that email is > 0
  */
  public function validate_uniqueUserName($value , $input, $args)
  {
    return ! (bool) $this->user->where('username', $value)->count();
  }

}
