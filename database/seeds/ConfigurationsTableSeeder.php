<?php

use Illuminate\Database\Seeder;
use \App\Configuration;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configurations = array(
            [
                'id' => 1,
                'key' => 'is_NLP_enabled',
                'value' => '1',
            ],
            [
                'id' => 2,
                'key' => 'facebook_page_id',
                'value' => '550418682000480',
            ],
            [
                'id' => 3,
                'key' => 'facebook_forever_page_access_token',
                'value' => 'EAACKvSbcEf8BAEypGuVtx4wkIgfC9O8mIdz9khV7jsm33STl8HI9Kbck0QcwCZA96Cqlkfq1kPQ0ZAua0PxEf2AdHrl59QNqpZAFv405zJVWnjn5zCDjvHwWEzSxtjZAhV6wxpGR4MMVep2YXw9toD18zZAoavzuEXXS9qGjnUAZDZD',

            ],
            [
                'id' => 4,
                'key' => 'facebook_user_access_token',
                'value' => 'EAACEdEose0cBAIhSMnMHGYRqCbaARTSZCQEHF30sq7LUrvWDnB0mMRritzQKo7zqbaQdZCZCDrsPsMB6sC01EBxxbJwbiKMzB5HOJ3fO7bDZBdkFSESi0aZAKSJFR2n4uKAY0TwBMyuwIsUOZCIs60BxZCR5z0bt8I9qHK9g2PQIe6XfPJytW6HeoOQdpHDI3cbZCM0holmf8QZDZD',
            ]
        );

        DB::table('configurations')->insert($configurations);
    }
}
