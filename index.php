<?php
include 'config.php';
spl_autoload_register(function ($class){
    include 'class/' . $class . '.php';
});

$action = $_REQUEST['action'] ?? '';
$subaction = $_REQUEST['action'] ?? '';
$view = 'spielbrett1';
$action = 'showSp1';


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
    case 'showSp1':
        $view = 'spielbrett1';
//        switch($subaction) {
//            case 'w':
//            {
//                $spielfeld_id =
//                Character::$spielfeld_id = Character::$spielfeld->getId();
//                break;
//            }
//
//            case 'a':
//            {
//                break;
//            }
//
//            case 's':
//            {
//                break;
//            }
//
//            case 'd':
//            {
//                break;
//            }
//            default:
//            {
//
//            }
//        }
        $spielbrett = Spielbrett::getSpielbrettById(1);
        break;
    default:
    {
        $view = 'startseiteanzeige';
        echo 'default';
    }

}

include 'view\\' . $view . '.php';
