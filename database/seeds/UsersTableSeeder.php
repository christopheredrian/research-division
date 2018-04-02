<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'Almighty Admin',
                'email' => 'aa@example.com',
                'password' => bcrypt('passwordballs'),
                'role' => 'superadmin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dan Ricky Ong',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'superadmin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Lina',
                'email' => 'lina@example.com',
                'password' => bcrypt('password'),
                'role' => 'rr',
                'created_at' => \Carbon\Carbon::now()
            ],
        );
        User::insert($users);
    }
}
