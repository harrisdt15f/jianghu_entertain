<?php

use App\Models\DeveloperUsage\Frontend\SystemRoutesH5;
use Illuminate\Database\Seeder;

/**
 * Class SystemRoutesH5Seeder
 */
class SystemRoutesH5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SystemRoutesH5::insert(
            [
                [
                    'route_name' => 'h5-api.login',
                    'method' => 'login',
                    'is_open' => 1,
                ],
                [
                    'route_name' => 'h5-api.logout',
                    'method' => 'logout',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'h5-api.user.refresh-token',
                    'method' => 'refreshToken',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'h5-api.games-lobby.rich-list',
                    'method' => 'richList',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'h5-api.games-lobby.games-categories',
                    'method' => 'category',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'h5-api.user.information',
                    'method' => 'information',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'h5-api.user.game-list',
                    'method' => 'gameList',
                    'is_open' => 0,
                ],
            ],
        );
    }
}