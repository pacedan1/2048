<?php

include_once 'game.php';

session_start();
var_dump($_POST);

$game = new game();

if (!isset($_SESSION['grid'])) {
    $game->init();
} else {
    $game->init($_SESSION['grid']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        switch ($_POST['input']) {
            case 'up':
                $game->up();
                break;
            case 'down':
                $game->down();
                break;
            case 'left':
                $game->left();
                break;
            case 'right':
                $game->right();
                break;
            case 'reset':
                $game->init();
                break;
            default:
                break;
        }
    }
}
$_SESSION['grid'] = $game->getGrid();

include_once 'display.php';
