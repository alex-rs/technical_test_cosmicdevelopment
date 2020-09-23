<?php

namespace App\Console\Commands;

use App\Adapters\Cosmic\API\APIProvider;
use App\Adapters\Cosmic\API\Employee;
use App\Adapters\Cosmic\Auth\AuthInterface;
use App\Repositories\Models\ModelFactory;
use Illuminate\Console\Command;

class LoadEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load employees list from API.';

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
     * @param AuthInterface $auth
     * @param Employee $provider
     * @return void
     */
    public function handle(AuthInterface $auth, Employee $provider, ModelFactory $factory)
    {
        $api = $provider->authenticate($auth);
        $repository = $factory::create('employee');

        $repository->dump();
        foreach ($api->list() as $employee){
            $repository->fill($employee);
        }

    }
}
