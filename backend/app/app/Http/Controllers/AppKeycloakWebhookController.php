<?php

namespace App\Http\Controllers;

use App\Models\AppFile;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $this->log([
            "-----------------------",
            "- " . date('Y-m-d H:i:s') . " -",
            "-----------------------",
            json_encode($scope, JSON_PRETTY_PRINT),
        ]);

        $this->appUserCreateActions($request);
        $this->appUserUpdateActions($request);
        $this->appUserDeleteActions($request);

        return $scope;
    }

    public function openApiData()
    {
        return [
            'tags' => ['app'],
        ];
    }

    protected function appUserCreateActions(Request $request)
    {
        if ($request->type == 'REGISTER') {
            AppUser::create([
                'name' => "{$request->details['first_name']} {$request->details['last_name']}",
                'email' => $request->details['email'],
                'keycloak_id' => $request->userId,
            ]);
        } else if ($request->type == 'USER-CREATE') {
            $details = json_decode($request->representation, true);
            AppUser::create([
                'name' => "{$details['firstName']} {$details['lastName']}",
                'email' => $details['email'],
                'keycloak_id' => $request->userId,
            ]);
        }
    }

    protected function log($data)
    {
        if (is_array($data)) $data = join("\n", $data) . "\n";
        File::prepend(storage_path('logs/webhook.log'), $data);
    }

    protected function appUserUpdateActions(Request $request)
    {
        // 
    }

    protected function appUserDeleteActions(Request $request)
    {
        if ($request->type == 'USER-DELETE') {
            $user = AppUser::where('keycloak_id', $request->userId)->first();
            if ($user) $user->delete();
        }
    }
}
