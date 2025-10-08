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
        $paths = explode('.', $path);
        $name = array_shift($paths);
        $configPath = implode('.', $paths);
        $appConfig = AppConfig::firstOrNew(['name' => $name], ['config' => []]);
        $config = array_merge(config("app_config.{$name}", []), $appConfig->config);
        return Arr::get($config, $configPath, $default);
    }

    static function set($path, $value)
    {
        $paths = explode('.', $path);
        $name = array_shift($paths);
        $configPath = implode('.', $paths);
        $appConfig = AppConfig::firstOrNew(['name' => $name], ['config' => []]);
        $config = array_merge(config("app_config.{$name}", []), $appConfig->config);
        $appConfig->config = Arr::set($config, $configPath, $value);
        $appConfig->save();
        return $appConfig->config;
    }
}
