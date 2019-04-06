<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('random-number/{hash}/{from}/{to}',  ['uses' => 'RandomNumberController@getRandomNumber']);
});