<?php

use App\Models\User\FrontendUser;
use Illuminate\Database\Seeder;

/**
 * Class FrontendUserSeeder
 */
class FrontendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FrontendUser::insert(
            [
             [
              'id'               => 1,
              'mobile'           => '13880628809',
              'guid'             => '18967100',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 2,
              'is_tester'        => 0,
              'password'         => '$2y$10$gNYXCLhuwCnb3wIE.JgCx.X2nrbEZejM9GE3IXUQPFsfRsFMYH/u2',
              'fund_password'    => '$2y$10$3ORT.Xykt2FYuC9VJsM0sueNO0KRIY1c5eAydq6wydV2YOmuGONSW',
              'security_code'    => '$2y$10$s/RXnjI0cU0f/ninzV0i2eO3U3Uegb1Xo4Sja0T.HuQoUajWZaz7i',
              'remember_token'   => null,
              'register_ip'      => '10.0.0.10',
              'last_login_ip'    => '10.0.0.10',
              'last_login_time'  => '2020-03-10 16:05:50',
              'user_specific_id' => 1,
              'user_tag_id'      => 2,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 3,
              'created_at'       => '2020-03-18 16:05:50',
              'updated_at'       => null,
             ],
             [
              'id'               => 2,
              'mobile'           => '18844446666',
              'guid'             => '18967200',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 2,
              'is_tester'        => 0,
              'password'         => '$2y$10$u5GRh.6MZx/GaWrvw9qQq.1wBXT7NV/pZiA5qsbTWa/FUfdrPHBt.',
              'fund_password'    => '$2y$10$3ORT.Xykt2FYuC9VJsM0sueNO0KRIY1c5eAydq6wydV2YOmuGONSW',
              'security_code'    => '$2y$10$s/RXnjI0cU0f/ninzV0i2eO3U3Uegb1Xo4Sja0T.HuQoUajWZaz7i',
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuamlhbmdodS5tZVwvaDUtYXBpXC9sb2dpbiIsImlhdCI6MTU5MDQwOTE0NSwiZXhwIjoxNTkwNDEyNzQ1LCJuYmYiOjE1OTA0MDkxNDUsImp0aSI6IjlQdHBKM3F6Qlp6RE93eE8iLCJzdWIiOjIsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.uoPkF1F6gTsMqZDLOwHD3biS62-Bynz2ZqwqfUw3fKU',
              'register_ip'      => '112.211.15.243',
              'last_login_ip'    => '172.19.0.1',
              'last_login_time'  => '2020-05-25 20:19:05',
              'user_specific_id' => 2,
              'user_tag_id'      => 3,
              'status'           => 1,
              'invite_code'      => 1896731,
              'is_online'        => 1,
              'device_code'      => 3,
              'created_at'       => '2020-03-18 16:05:50',
              'updated_at'       => '2020-05-25 20:19:05',
             ],
             [
              'id'               => 3,
              'mobile'           => '18822223333',
              'guid'             => '18967300',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 2,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 2,
              'is_tester'        => 0,
              'password'         => '$2y$10$gNYXCLhuwCnb3wIE.JgCx.X2nrbEZejM9GE3IXUQPFsfRsFMYH/u2',
              'fund_password'    => '$2y$10$3ORT.Xykt2FYuC9VJsM0sueNO0KRIY1c5eAydq6wydV2YOmuGONSW',
              'security_code'    => '$2y$10$s/RXnjI0cU0f/ninzV0i2eO3U3Uegb1Xo4Sja0T.HuQoUajWZaz7i',
              'remember_token'   => null,
              'register_ip'      => '10.0.0.10',
              'last_login_ip'    => '10.0.0.10',
              'last_login_time'  => '2020-03-10 16:05:50',
              'user_specific_id' => 2,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 1234567,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-03-18 16:05:50',
              'updated_at'       => null,
             ],
             [
              'id'               => 4,
              'mobile'           => '18844440000',
              'guid'             => '1577688',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 1,
              'is_tester'        => 0,
              'password'         => '$2y$10$buGD7fF8yKXYpnpAhmzKeOoqH5/Tbc.94v.mK6vsy4sBgo7dVlTem',
              'fund_password'    => null,
              'security_code'    => null,
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMzk3MDE3LmNvbVwvaDUtYXBpXC9yZWdpc3RlciIsImlhdCI6MTU5MDIzNzY1MCwiZXhwIjoxNTkwMjQxMjUwLCJuYmYiOjE1OTAyMzc2NTAsImp0aSI6InYyR3NNcE5ZNVJmNFNIdXMiLCJzdWIiOjQsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.To_F1A4d6Svgm3DIxRbn8yGzsSjgh8UhDg6sCm9XyIo',
              'register_ip'      => '112.211.15.243',
              'last_login_ip'    => '112.211.15.243',
              'last_login_time'  => '2020-05-23 20:40:50',
              'user_specific_id' => null,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-05-23 20:40:50',
              'updated_at'       => '2020-05-23 20:40:50',
             ],
             [
              'id'               => 5,
              'mobile'           => '13412312311',
              'guid'             => '5749456',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 1,
              'is_tester'        => 0,
              'password'         => '$2y$10$ZgY7DOxEY6lgiaY6SRRfouhbatpzSY0BtC6P4vP0eP7bTdx4zAhg2',
              'fund_password'    => null,
              'security_code'    => null,
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMzk3MDE3LmNvbVwvaDUtYXBpXC9yZWdpc3RlciIsImlhdCI6MTU5MDIzODAxNiwiZXhwIjoxNTkwMjQxNjE2LCJuYmYiOjE1OTAyMzgwMTYsImp0aSI6InMycFg2MlJtcWgwQnVDc28iLCJzdWIiOjUsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.kVkktdxZ1aLj3p0q3phBNA4RUqsLbqqkXApc8BL-H98',
              'register_ip'      => '219.132.115.233',
              'last_login_ip'    => '219.132.115.233',
              'last_login_time'  => '2020-05-23 20:46:56',
              'user_specific_id' => null,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-05-23 20:46:56',
              'updated_at'       => '2020-05-23 20:46:56',
             ],
             [
              'id'               => 6,
              'mobile'           => '18844440001',
              'guid'             => '5038861',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 1,
              'is_tester'        => 0,
              'password'         => '$2y$10$mOlhV0OIF1NVEEQ0in4aduILuk0NB0LGxOheDj7qqrwsyKJTnD6ne',
              'fund_password'    => null,
              'security_code'    => null,
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMzk3MDE3LmNvbVwvaDUtYXBpXC9yZWdpc3RlciIsImlhdCI6MTU5MDIzODA4OSwiZXhwIjoxNTkwMjQxNjg5LCJuYmYiOjE1OTAyMzgwODksImp0aSI6InBtTGhMSmdVU2J3bWh5d3UiLCJzdWIiOjYsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.Unf2z2y_xDq5uvmZKzf7nAp9U8tkoa73IWt0VpWFHHU',
              'register_ip'      => '112.211.15.243',
              'last_login_ip'    => '112.211.15.243',
              'last_login_time'  => '2020-05-23 20:48:09',
              'user_specific_id' => null,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-05-23 20:48:09',
              'updated_at'       => '2020-05-23 20:48:09',
             ],
             [
              'id'               => 7,
              'mobile'           => '18844440002',
              'guid'             => '3498306',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 1,
              'is_tester'        => 0,
              'password'         => '$2y$10$Seirw614bOXObxwR8h21R.z3G7QDqd9ZjL8hKaOy2jmeDE.Ae0DDe',
              'fund_password'    => null,
              'security_code'    => null,
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMzk3MDE3LmNvbVwvaDUtYXBpXC9yZWdpc3RlciIsImlhdCI6MTU5MDIzODExMywiZXhwIjoxNTkwMjQxNzEzLCJuYmYiOjE1OTAyMzgxMTMsImp0aSI6IlhHSXIxOE1oNDdBaFhYemoiLCJzdWIiOjcsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.kEoxKwnRVpgMrmlDDTrEtqZEe5A8gBNoFJci0IxyEOI',
              'register_ip'      => '112.211.15.243',
              'last_login_ip'    => '112.211.15.243',
              'last_login_time'  => '2020-05-23 20:48:33',
              'user_specific_id' => null,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-05-23 20:48:33',
              'updated_at'       => '2020-05-23 20:48:33',
             ],
             [
              'id'               => 8,
              'mobile'           => '13412312313',
              'guid'             => '8920536',
              'top_id'           => 0,
              'parent_id'        => 0,
              'platform_id'      => 1,
              'level_id'         => 1,
              'platform_sign'    => 'JHHY',
              'type'             => 1,
              'is_tester'        => 0,
              'password'         => '$2y$10$w68Px7b7effQ2LmBPWSofuTSkU0jykxl3MSWd2736LU9g.nsMpkYW',
              'fund_password'    => null,
              'security_code'    => null,
              'remember_token'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMzk3MDE3LmNvbVwvaDUtYXBpXC9sb2dpbiIsImlhdCI6MTU5MDM0NTA3MCwiZXhwIjoxNTkwMzQ4NjcwLCJuYmYiOjE1OTAzNDUwNzAsImp0aSI6InZXN0diVVAzbk91R3NXaVciLCJzdWIiOjgsInBydiI6Ijc2NGU3MjkwYzEwMjRjMDgwOWUxNzZlMmE0MjUzNTI2MjIyNjZjMDkifQ.ojrzADzW_7r68UAddNn2xXSDiY1yLL0TaUVD7c94elc',
              'register_ip'      => '219.132.115.233',
              'last_login_ip'    => '219.132.115.233',
              'last_login_time'  => '2020-05-25 02:31:10',
              'user_specific_id' => null,
              'user_tag_id'      => 1,
              'status'           => 1,
              'invite_code'      => 0,
              'is_online'        => 0,
              'device_code'      => 2,
              'created_at'       => '2020-05-23 20:53:33',
              'updated_at'       => '2020-05-25 02:31:10',
             ],
            ],
        );
    }
}
