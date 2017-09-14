<?php

$app->get('/', TExAPITest\Action\HomePageAction::class, 'home');
$app->get('/cars', TExAPITest\Action\CarsAction::class, 'cars');