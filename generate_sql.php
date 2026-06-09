<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Force MySQL connection to get MySQL syntax
config(['database.default' => 'mysql']);
config(['database.connections.mysql.database' => 'dummy_db']);

use Illuminate\Support\Facades\Artisan;
Artisan::call('migrate', ['--pretend' => true]);
echo Artisan::output();
