<?php

namespace App\Models;

use Illuminate\Support\Arr;
use MongoDB\Laravel\Eloquent\Model;

class AppConfig extends Model
{
    protected $table = 'app_config';
    protected $fillable = ['name', 'config'];

    static function get($path, $default = null)
    {
        $scope = self::pathInfo($path);
        $default = config("app_config.{$scope->name}", []);
        $default = Arr::get($default, $scope->path, $default);
        $appConfig = AppConfig::firstOrNew(['name' => $scope->name], ['config' => []]);
        $config = Arr::get($appConfig->config, $scope->path, $default);
        if (is_array($default)) $config = array_merge($default, $config);
        return $config;
    }

    static function set($path, $value)
    {
        $scope = self::pathInfo($path);
        $default = config("app_config.{$scope->name}", []);
        $appConfig = AppConfig::firstOrNew(['name' => $scope->name], ['config' => []]);
        $config = array_merge($default, $appConfig->config);

        if ($scope->path) {
            Arr::set($config, $scope->path, $value);
        } else {
            if (is_array($value)) {
                $config = array_merge($config, $value);
            }
        }

        $appConfig->config = $config;
        $appConfig->save();
        return $config;
    }

    protected static function pathInfo($path)
    {
        $scope = (object) ['name' => null, 'path' => null];
        $scope->path = explode('.', $path);
        $scope->name = array_shift($scope->path);
        $scope->path = join('.', $scope->path);
        $scope->path = $scope->path ? $scope->path : null;
        return $scope;
    }
}
