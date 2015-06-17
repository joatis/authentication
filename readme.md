h1=Authentication 

This is my work that follows the authentication system example 
from phpacademy.

Dependencies:
1. composer - This project is missing the composer.phar because I am developing on a Windows 8 machine where composer has been installed manually.

2. slim - "composer require slim/slim"

3. slim views - "composer require slim/views" allows you to use Twig templates.

4. Twig - "composer require twig/twig" Because we're using the Twig templates instead of the Smarty one provided by slim/views.

5. PHPMailer - "composer require phpmailer/phpmailer" for sending emails  

6. config - "composer require hassankhan/config" For creating a development/production configurations 

7. database - "composer require illuminate/database" Laravels method for connecting and using a database.

8. vilion - "composer require alexgarrett/violin" Easily create your own validation class

9. RandomLib - "composer require ircmaxell/random-lib" For creating unique random numbers (SHA-256)

Alex Garret then reccomends that the versions in the composer.json file get tweaked so they end up being:
{
    "require": {
        "slim/slim": "~2.0",
        "slim/views": "0.1.*",
        "twig/twig": "~1.0",
        "phpmailer/phpmailer": "~5.2",
        "hassankhan/config": "0.8.*",
        "illuminate/database": "~5.0",
        "alexgarrett/violin": "2.*",
        "ircmaxell/random-lib": "~1.1"
    }
}




