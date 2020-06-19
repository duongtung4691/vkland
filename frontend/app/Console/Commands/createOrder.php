<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Core\Business\ShoppingCartBusiness;

class createOrder extends Command
{

    protected $signature = 'create:order';
    protected $description = 'Create new Order';

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
        ShoppingCartBusiness::createOrders();
        $this->info('Create:Order Cummand Run successfully!');
    }
}
