<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCommand extends Command
{

    protected $signature = 'create:admin';


    protected $description = 'Created Admin Successfully';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $name = $this->ask('Enter Your Name');
        $email = $this->ask('Enter Your Email');
        $password = $this->secret('Enter Your Password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Your Super account Created');

        return Command::SUCCESS;

    }
}
