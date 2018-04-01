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
                'value' => '181561485987909',
            ],
            [
                'id' => 3,
                'key' => 'facebook_forever_page_access_token',
                'value' => 'EAACKvSbcEf8BAMHAhXSAc2Y7aRQmmk95SOsXcjmZCmzZBju5cxZCps6WduZCd6ivZB18I8LPOQGfiIm4IG9kLY0WIfaHfkMfk98V1vAzFFZAWsVZAtsyJ8IkfWi9ZCBKc9YmfAMcdTBJuZCC40I188Upd688wZAFblCwrmHOe9iZCW5cwZDZD',

            ],
            [
                'id' => 4,
                'key' => 'facebook_user_access_token',
                'value' => 'EAACKvSbcEf8BAON4Jyk4L0u1jXgnKLZAacF9zEwVUTZB5Gx2fAwcKFb44rekqb2Nqm7AZCbZB8BGvZBTTzRadRQG5fA8g16K7hpJO1yUBXSgZBFFuC3kJ2d7qcYiwWDvkV0PqoZBI5eno7CCvEVo7rbnnDOmpZABdc3PSH2YALE4vQz9L6ScZCw5kXhQjoFvI8DXqd3NoogNC2AZDZD',
            ]
        );

        DB::table('configurations')->insert($configurations);
    }
}
