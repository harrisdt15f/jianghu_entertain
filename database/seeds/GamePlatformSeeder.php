<?php

use App\Models\Platform\GamesPlatform;
use Illuminate\Database\Seeder;

/**
 * Class GamePlatformSeeder
 */
class GamePlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        GamesPlatform::insert(
            [
             [
              'id'            => 1,
              'platform_sign' => 'test',
              'game_sign'     => 'kxxxq',
              'status'        => 1,
              'sort'          => 1,
              'is_hot'        => 0,
              'device'        => 2,
             ],
             [
              'id'            => 2,
              'platform_sign' => 'test',
              'game_sign'     => 'ddz',
              'status'        => 1,
              'sort'          => 3,
              'is_hot'        => 1,
              'device'        => 2,
             ],
             [
              'id'            => 3,
              'platform_sign' => 'test',
              'game_sign'     => 'bjpk',
              'status'        => 1,
              'sort'          => 1,
              'is_hot'        => 1,
              'device'        => 2,
             ],
            ],
        );
    }
}
