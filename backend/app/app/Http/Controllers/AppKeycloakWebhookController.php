<?php

namespace App\Http\Controllers;

use App\Models\AppFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppKeycloakWebhookController extends Controller
{
    public $methods = ['get', 'post', 'put', 'patch'];
    public $route = '/app/keycloak_webhook';

    public function __invoke(Request $request)
    {
        $scope = new \stdClass;
        $scope->method = $request->method();
        $scope->all = $request->all();
        file_put_contents(base_path('webhook.json'), json_encode($scope, JSON_PRETTY_PRINT));
        return $scope;
    }

    public function openApiData()
    {
        return [
            'tags' => ['app'],
        ];
    }
}
