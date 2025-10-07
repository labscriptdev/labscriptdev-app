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
        $config = AppConfig::where('name', $name)->first();

        if (!$config) {
            $config_file = config("app_config.{$name}", []);
            AppConfig::create(['name' => $name, 'config' => $config_file]);
            $config = AppConfig::where('name', $name)->first();
        }

        $config_data = $config->config;
        $config_data = is_array($config_data) ? $config_data : [];
        $config_data = array_merge($config_data, config("app_config.{$name}", []));

        $config_path = implode('.', $paths);
        $config_path = $config_path ? $config_path : null;
        return Arr::get($config_data, $config_path, $default);
    }
}
