<?php

namespace App\Http\Controllers;

use App\Models\AppFile;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppKeycloakWebhookController extends Controller
{
    public $methods = ['post'];
    public $route = '/app/keycloak_webhook';

    public function __invoke(Request $request)
    {
        $scope = new \stdClass;
        $scope->method = $request->method();

        $scope->authorization = $request->header('Authorization');
        $scope->authorization = str_replace('Basic ', '', $scope->authorization);
        if ($scope->authorization != 'YXBwOmFwcA==') return;

        $scope->all = $request->all();

        // $output_file = base_path('webhook.log');
        // $content = '';
        // $content .= "\n-----------------------";
        // $content .= "\n- " . date('Y-m-d H:i:s') . " -";
        // $content .= "\n-----------------------";
        // $content .= "\n" . json_encode($scope, JSON_PRETTY_PRINT);
        // $content .= "\n" . file_get_contents($output_file);
        // file_put_contents($output_file, $content);

        if ($request->type == 'REGISTER') {
            $this->appUserRegister($request);
        }

        return $scope;
    }

    public function openApiData()
    {
        return [
            'tags' => ['app'],
        ];
    }

    public function appUserRegister(Request $request)
    {
        AppUser::create([
            'name' => "{$request->details['first_name']} {$request->details['last_name']}",
            'email' => $request->details['email'],
            'keycloak_id' => $request->userId,
        ]);
    }
}
