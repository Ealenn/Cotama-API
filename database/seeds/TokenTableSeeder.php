<?php

use Illuminate\Database\Seeder;

class TokenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('oauth_clients')->insert([
            'id' => 1,
            'name' => 'COTAMA_API',
            'secret' => 'IT63wuce0swwvlsw6B9z8MBGoh8qwU6D9yr6zAUA',
            'redirect' => 'https://cotama.fr',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0
        ]);

        \Illuminate\Support\Facades\DB::table('oauth_access_tokens')->insert([
            'id' => '3889eeeb853a5d514ef4f53471702d876ca740609a6ce8a3a1e34390ac74266211c7380a2eabf2b1',
            'user_id' => 1,
            'client_id' => 1,
            'scopes' => '["*"]',
            'revoked' => 0,
            'created_at' => '2016-06-30 07:41:46',
            'updated_at' => '2016-06-30 07:41:46',
            'expires_at' => '2020-06-30 07:41:46'
        ]);

        \Illuminate\Support\Facades\DB::table('oauth_refresh_tokens')->insert([
            'id' => '425f14dd07460d4de9806a2879a6162f025a17ab795b6f93f97a757ea93160f814dcbd9fb4580105',
            'access_token_id' => '3889eeeb853a5d514ef4f53471702d876ca740609a6ce8a3a1e34390ac74266211c7380a2eabf2b1',
            'revoked' => 0,
            'expires_at' => '2018-06-30 07:41:46'
        ]);
    }
}

/*

eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM4ODllZWViODUzYTVkNTE0ZWY0ZjUzNDcxNzAyZDg3NmNhNzQwNjA5YTZjZThhM2ExZTM0MzkwYWM3NDI2NjIxMWM3MzgwYTJlYWJmMmIxIn0.eyJhdWQiOiIxIiwianRpIjoiMzg4OWVlZWI4NTNhNWQ1MTRlZjRmNTM0NzE3MDJkODc2Y2E3NDA2MDlhNmNlOGEzYTFlMzQzOTBhYzc0MjY2MjExYzczODBhMmVhYmYyYjEiLCJpYXQiOjE0OTg4MDg5ODMsIm5iZiI6MTQ5ODgwODk4MywiZXhwIjoxNTMwMzQ0OTgzLCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.EhD0Sa6qXIXWhwWqKvQ7TsLOKeViWfWj6efRVaUTpt4P1ByvpTHa4nFeHklHqkrz2UEl7-iX84vqEh1BFmQTNp3w8tmB1-6VpU7YsfpHS7e3tKkrsFAox7ZbyiFk7MjTXMmSoHdm_fVFG7gzF4h59KHuxkjpV2rz8ynxlSB2hLzuks_82UBpGw4l9VrjHbUgDDaetwI5kmeQF69Vp8CuY_HEaInvnFR47YLbPBbMpGZd2jeXIgVUd2UiXvqjGci_tDWTtJGqoXVe_ErG-USno-05E-BKQ8bpxiKArfoGjm5ozGcOD54xHXPOFrPM4iZpqFZoSRHjQtHSBZ3BthEfqd3fnLH5ebtaisFEsY_Kw6B-kkKLFGRJ1u0k3CJoeLGZmvj_RUE8Ai5vRJbiaEvEsha5-hv4dwWmML66lnbstj0Lm6d3Q1Rz6gv5MF4FBMQRlDHrmATQJRpk1zI9lsQikKNNfazJvRH3HDL7c-5VDyZCdqrfbXQrgWisTj7TLXIzccX6bg1MOCOuWrF604I_4pID96qaslIUiB-n7VNRg0Xs6Rn2TcDBSof-fHJQQ-vpsk9h7KVvsPSHUthvY5aElVLk8UhWXUpmHbeBYz3k3AyMQdqDxvr8z0uZnJRCT3JwzM_9dHegN3KaXwB2cY_dA8tRGbBIURGZVy8k1JPJtko

 */