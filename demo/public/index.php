<?php

session_start();

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);




/*$id = $_GET['id'];*/
/*$query = "select * from posts where id = :id";
require base_path('Response.php');

$posts = $db->query($query, [':id' => 1])->fetch();

dd($posts);*/


/*class Person {
      public $name;
      public  $age;

      public function breathe() {
          echo $this->name.' is breathing';
      }
  }

  $person = new Person();

  $person ->name = ' john doe ';
  $person ->age  = 25;

$person->breathe();*/




