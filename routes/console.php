<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsScrapingController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with your commands' IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Define a custom Artisan command to trigger news scraping
Artisan::command('news:scrape', function () {
    $this->info('Starting news scraping...');
    $controller = new NewsScrapingController();
    $response = $controller->scrapeRiauNews();
    $data = json_decode($response->getContent(), true);

    if ($data['success']) {
        $this->info($data['message']);
    } else {
        $this->error('Scraping failed: ' . $data['message']);
    }
    $this->info('News scraping finished.');
})->purpose('Scrape news articles from predefined sources.');
