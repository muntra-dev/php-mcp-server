<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpMcp\Server\Server;
use PhpMcp\Server\Transports\StdioServerTransport;
use App\CalculatorElements;

try {
    $server = Server::make()
        ->withServerInfo('PHP Calculator Server', '1.0.0')
        
        // Manual registration required for PHP 7.1
        // ->withTool([CalculatorElements::class, 'add'], 'add_numbers')
        // ->withTool([CalculatorElements::class, 'power'], 'calculate_power') 
        // ->withTool([CalculatorElements::class, 'calculate'], 'calculate')
        // ->withTool([CalculatorElements::class, 'updateSetting'], 'update_setting')
        // ->withResource([CalculatorElements::class, 'getConfiguration'], 'config://calculator/settings')
        
        ->build();

    $transport = new StdioServerTransport();
    $server->listen($transport);

} catch (\Throwable $e) {
    fwrite(STDERR, "[CRITICAL ERROR] " . $e->getMessage() . "\n");
    exit(1);
}