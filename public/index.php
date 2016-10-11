<?php
define('ROOT', dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

class App extends Application
{
    use Silex\Application\TwigTrait;
    use Silex\Application\UrlGeneratorTrait;

    public function __get($name)
    {
        return $this[$name];
    }
}

$app = new App;

$app['debug'] = true;

$app->get('/', function () use ($app) {
    return $app->render('main.twig');
})->bind('index');

$app->run();