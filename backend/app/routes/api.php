<?php

App\Http\Controllers\Controller::register([
    App\Http\Controllers\AppLoadController::class,
    App\Http\Controllers\AppFileCreateController::class,
    App\Http\Controllers\AppKeycloakWebhookController::class,
]);
