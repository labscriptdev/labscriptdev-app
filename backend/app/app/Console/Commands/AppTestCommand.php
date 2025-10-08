<?php

namespace App\Console\Commands;

use App\Models\AppConfig;
use Illuminate\Console\Command;

class AppTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // AppConfig::set('secret.root_user_id', null);
        // $id = AppConfig::get('secret.root_user_id');
        // dump($id);

        // dump(AppConfig::get('secret'));
        // dump(AppConfig::get('secret.root_user_id'));
        // dump(AppConfig::set('secret', 123));
        // dump(AppConfig::set('secret', ['root_user_id' => '68e5f51f03f7240a41019a04']));
        // dump(AppConfig::set('secret.root_user_id', '68e5f51f03f7240a41019a04'));
    }
}

// 68e5f51f03f7240a41019a04
