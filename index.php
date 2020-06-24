<?php

spl_autoload_register(function ($class){
    include 'class/' . $class . '.php';
});

$view = '';
$action = $_REQUEST['action'] ?? '';



switch($action) {

    case 'registrieren':
    {

        echo 'registrieren';

        $area = 'registrieren';
        $view =  $area . 'anzeige';
        break;
    }

    case 'einloggen':
    {

        echo 'einloggen';

        break;
    }

    case 'eingeloggt':
    {

        $view = 'startseiteanzeige';
        echo 'eingeloggt';

        break;
    }

    default:
    {

        $view = 'startseiteanzeige';
        echo 'default';

    }

}

include 'view\\' . $view . '.php';

spl_autoload_register(function ($class){
    include 'class/' . $class . '.php';
});

$view = '';
$action = $_REQUEST['action'] ?? '';

switch($action) {

    case 'registrieren':
    {

        echo 'registrieren';

        $area = 'registrieren';
        $view =  $area . 'anzeige';
        break;
    }

    case 'einloggen':
    {

        echo 'einloggen';

        break;
    }

    case 'eingeloggt':
    {

        $view = 'startseiteanzeige';
        echo 'eingeloggt';

        break;
    }

    default:
    {

        $view = 'startseiteanzeige';
        echo 'default';

    }

}

include 'view\\' . $view . '.php';
