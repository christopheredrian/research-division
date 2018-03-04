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
                'value' => '223969308167622',
            ],
            [
                'id' => 3,
                'key' => 'facebook_forever_page_access_token',
                'value' => 'EAACKvSbcEf8BACAFlTR22AvnYzQ1xD9YY9LzZC1eARHxLpUZCH5BtiGLpeEDitWCluP9JBGCXZAhb8wZAzCTbHMJari7hjnyHGEjZAnDFbcYnowQZCfF38JBTwCCzkBdWCHl3j5g1h6xMps6vzCBeNG941K8saEkEgcOunxFszwQZDZD',
            ],
            [
                'id' => 4,
                'key' => 'facebook_user_access_token',
                'value' => 'EAACKvSbcEf8BAHlYiHZBGh0lwaO52UAmsmcwtFnvERNDDi9T2p2D5qXYwZCXLboofTps7HE95UxSmjKmSxpdaUPfJkyayNZC3REuOpNRgXRITNoAVBcTri5dLkTDqzkZBrdBtKnROA3rCtOVrE9oWZBECokaNYrPxm4J5XWUfQ5343rqrbVC2OGOereb6UZATW8zqLmzdnowZDZD',
            ]
        );

        DB::table('configurations')->insert($configurations);
    }
}
