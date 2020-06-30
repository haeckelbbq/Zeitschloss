<?php
include 'config.php';
spl_autoload_register(function ($class){
    include 'class/' . $class . '.php';
});

$id = $_REQUEST['id'] ?? 0;
$action = $_REQUEST['action'] ?? '';
$subaction = $_REQUEST['subaction'] ?? '';
$spielfeld_id = $_POST['spielfeld_id'] ?? '';
$view = 'spielbrett1';

if($action==''){$action = 'showSp1';};

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

    case 'updaten':
    {
        Character::updateCharacterposition($spielfeld_id);
        $view = 'spielbrett1';
        $spielbrett = Spielbrett::getSpielbrettById(1);
        break;
    }
    case 'showSp1':
        $view = 'spielbrett1';
//        switch($subaction) {
//            case 'w':
//            {
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
