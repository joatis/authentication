<?php

namespace joatis3\Middleware;

use Slim\Middleware;

class BeforeMiddleware extends Middleware
{
  public function call()
  {
    $this->app->hook('slim.before', [$this, 'run']);

    $this->next->call();
  }

  public function run()
  {
    if (isset($_SESSION[$this->app->config->get('auth.session')])) {
      // user is authenticated
      // set auth to the user record where the sessionId matches the id of the session
      // Calling ->first() on the user object fetches and sets the auth with data from the
      // user record.
      $this->app->auth = $this->app->user->where('id', $_SESSION[$this->app->config->get('auth.session')])->first();
    }

    /*
    Append the auth object to all of the views so they can use properties of the app
    */
    $this->app->view()->appendData([
      'auth' => $this->app->auth
      ]);
  }
}
