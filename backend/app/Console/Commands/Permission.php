<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Permission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission';

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
        $routeCollection = \Route::getRoutes();
        $routes = [];
        foreach ($routeCollection as $route)
        {
            // Get the action which is an array of items
            $action = $route->getAction();
            // If the action has the key 'controller'
            if (array_key_exists('controller', $action)) {
                // Explode the string with @ creating an array with a count of 2
                $controller = class_basename($action['controller']);
                $explodedAction = explode('@', $controller);
                // Check to see if an array exists for the controller name
                $explodedAction[0] = str_replace('Controller', '', $explodedAction[0]);
                if (!isset($routes[$explodedAction[0]])) {
                    // If not create it, this will look like $routes['controllerName']
                    $routes[$explodedAction[0]] = [];
                }
                // Set the add the method name to the controller array
                $routes[$explodedAction[0]][] = $explodedAction[1];
            }
        }
        // Delete = Truncate data
        DB::table('permissions')->delete();
        $id = 1;
        // Show the glory of your work
        foreach ($routes as $controller => $actions) {
            foreach ($actions as $action) {
                echo sanitize($controller) . '.' . $action . "\n";
                $p = DB::table('permissions')->where(['name' => sanitize($controller) . '.' . $action]);
                if (!$p->exists()) {
                    DB::table('permissions')->insert([
                        'id' => $id,
                        'name' => sanitize($controller) . '.' . $action,
                        'slug' => sanitize($controller) . '-' . sanitize($action),
                        'group_name' => sanitize($controller),
                        'description' => sanitize($controller),
                        'guard_name' => 'web',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    $id++;
                }
            }
        }
    }
}
