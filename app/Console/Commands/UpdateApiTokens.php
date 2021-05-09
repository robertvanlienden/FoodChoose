<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UpdateApiTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates all api tokens';

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
        $users = User::all();
        $totalUsers = count($users);
        $updatedCounter = 0;

        foreach($users as $user){
            $user->api_token = Str::random(60);
            $user->save();
            echo "API Token for " .$user->email. " updated!";
            echo "\n";
            $updatedCounter++;
        }
        echo $updatedCounter . " of " . $totalUsers . " updated";
        echo "\n";
    }
}
