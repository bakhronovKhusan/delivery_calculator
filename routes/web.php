<?php

use App\controllers\indexController;
use Core\Route;

(new Route())->ADD([
    ['GET',   '/' ,      indexController::class, 'show' ],
    ['POST',   '/add' ,  indexController::class, 'add'  ],
]);