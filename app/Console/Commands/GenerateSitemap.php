<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "generate sitemap foodchoose.nl \n\n";
        SitemapGenerator::create('https://foodchoose.nl')
            ->writeToFile(public_path('sitemap-nl.xml'));
        echo "generate sitemap foodchoose.be \n\n";
        SitemapGenerator::create('https://foodchoose.be')
            ->writeToFile(public_path('sitemap-be.xml'));
        echo "generate sitemap foodchoose.online \n\n";
        SitemapGenerator::create('https://foodchoose.online')
            ->writeToFile(public_path('sitemap-online.xml'));
    }
}
