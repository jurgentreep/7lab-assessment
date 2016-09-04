<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you want to create a user?'))
            $this->createAccount();
    }

    private function createAccount(){

        $this->command->info('----  Lets create an administrator account  ----');
        $name = $this->command->ask('What is your name?');

        $this->command->info('Hello '.$name);

        $email = $this->command->ask('Please enter a valid e-mail address');

        $password = $this->password();

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'remember_token' => str_random(10),
        ]);

        if( $user )
            $this->command->info('----  Account created  ----');

        if ($this->command->confirm('Do you wish to create another user?'))
            $this->createAccount();
    }

    private function password(){

        $pass1 = $this->command->secret('Please enter a password');
        $pass2 = $this->command->secret('Re-enter your password');

        if( $pass1 !== $pass2 ){
            $this->command->error('Passwords do not match');
            return $this->password();
        }
        return $pass1;
    }
}
