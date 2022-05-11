<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('¿You want to clean the database before running the seed?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Deleted data base starting with a blank DB");
        }

        $email = 'admin@app.com';
        $password = 'password';

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => $email ,
            'password' => Hash::make($password),
            'enable' => true
        ]);


        $this->command->info('Admin User Credentials');
        $this->command->info('User: '.$email);
        $this->command->info('Password: '.$password);
        $this->command->warn('Ready :)');
    }
}