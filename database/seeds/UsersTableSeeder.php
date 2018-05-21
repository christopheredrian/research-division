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
                'name' => 'Maintenance',
                'email' => 'maintenance@rdspbaguio.com',
                'password' => bcrypt('maintenance'),
                'role' => 'superadmin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dan Ricky Ong',
                'email' => 'danrickyong@rdspbaguio.com',
                'password' => bcrypt('ongrdspbaguio'),
                'role' => 'superadmin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Eliza Orduña',
                'email' => 'elizaorduna@rdspbaguio.com',
                'password' => bcrypt('ordunardspbaguio'),
                'role' => 'me',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Michelle Dulay',
                'email' => 'michelledulay@rdspbaguio.com',
                'password' => bcrypt('dulayrdspbaguio'),
                'role' => 'me',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Nechel Ocasion',
                'email' => 'nechelocasion@rdspbaguio.com',
                'password' => bcrypt('ocasionrdspbaguio'),
                'role' => 'me',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Jackielou Rondez',
                'email' => 'jackielourondez@rdspbaguio.com',
                'password' => bcrypt('rondezrdspbaguio'),
                'role' => 'me',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Felina Diaz',
                'email' => 'felinadiaz@rdspbaguio.com',
                'password' => bcrypt('diazrdspbaguio'),
                'role' => 'rr',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mario Posadas',
                'email' => 'marioposadas@rdspbaguio.com',
                'password' => bcrypt('posadasrdspbaguio'),
                'role' => 'rr',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gloria Borja',
                'email' => 'gloriaborja@rdspbaguio.com',
                'password' => bcrypt('borjardspbaguio'),
                'role' => 'rr',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Norman Ronquillo',
                'email' => 'normanronquillo@rdspbaguio.com',
                'password' => bcrypt('ronquillordspbaguio'),
                'role' => 'rr',
                'created_at' => \Carbon\Carbon::now()
            ],
            
        );
        User::insert($users);
    }
}
