<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Spiecie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nickname'  => '',
            'birth'     => '0304-02-01',
            'pic'       => bcrypt('img/profile_1387129839.jpg'),
            'name'      => 'Osmar',
            'diploma'   => bcrypt('pdf/diplomas/1231445345.pdf'),
            'email'     => 'osmar_cossin@email.com',
            'password'  => env('PASSWORD_HASH') ? bcrypt('12345') : '12345',
        ]);

        Spiecie::create([
            'spiecie'     => 'Felis Catus',
            'niche'       => 'animal',
            'habitat'     => 'anywhere',
            'common_name' => 'cat',
            'pic_id'      => bcrypt('spiecie_pic/cat001.jpg'),
            'authors'     => 'Osmar',
        ]);


    }
}
