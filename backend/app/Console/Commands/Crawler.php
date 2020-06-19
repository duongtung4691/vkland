<?php

namespace App\Console\Commands;

use App\Core\Enums\ApiEnum;
use App\Http\Controllers\CrawlerController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use App\Core\Connection\RedisServer;

class Crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $crawler = new CrawlerController();
        $page = $crawler->insertData();
        $this->info('Import dữ liệu ' . $page . ' bản ghi thành công');
    }
}
