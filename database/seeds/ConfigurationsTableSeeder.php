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
                'value' => 'EAACKvSbcEf8BAPy9llNXBSx3Ufz5eMWBxLH2fEob88GQk3dGmZAkQBvgjdzYYawpshtj0iqUT6HSmK5EQtGgr8C1YFv1bnwFGZBI2c7pzhQ7ErtiEnu6JMQO0shV7dNKPkiUqb2Gg4yyoscxpEfyeN1ZCcXKlzrHVsHvLd4ZCQZDZD',

            ],
            [
                'id' => 4,
                'key' => 'facebook_user_access_token',
                'value' => 'EAACKvSbcEf8BAHTgqGgcc0wHMDhdteiz7zOwmQvo5JLbinZCgcM0rmyQujtrX8Rz7hnbBcSYZAxhmDdVajehu04J46adr5GQbnm144krMskI19AsBs3a9ZAk2UKvhtLaTpYlYSYKFERGMUQTK0NzFRnCvF89qcM8yxIm88pChlTSAmorwZC6ZCoOYVAtfVEZCWeZA9tvMt6jgZDZD',
            ]
        );

        DB::table('configurations')->insert($configurations);
    }
}
