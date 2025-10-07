<?php

namespace App\Http\Controllers;

use App\Models\AppFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppLoadController extends Controller
{
    public $methods = ['get'];
    public $route = '/load';

    public function __invoke(Request $request)
    {
        $scope = new \stdClass;
        return $scope;
    }

    public function openApiData()
    {
        return [
            'tags' => ['app'],
        ];
    }
}
