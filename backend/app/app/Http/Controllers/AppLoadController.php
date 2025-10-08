<?php

namespace App\Http\Controllers;

use App\Models\AppConfig;
use Illuminate\Http\Request;

class AppLoadController extends Controller
{
    public $methods = ['get'];
    public $route = '/app/load';

    public function __invoke(Request $request)
    {
        $scope = new \stdClass;
        $scope->config = AppConfig::get('public');
        $scope->user = $request->user();
        return $scope;
    }

    public function openApiData()
    {
        return [
            'tags' => ['app'],
        ];
    }
}
