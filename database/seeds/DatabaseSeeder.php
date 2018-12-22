<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Spiecie;
use App\Entities\Niche;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*User::create([
            'nickname'      => '',
            'birth'         => '0304-02-01',
            'pic'           => env('PASSWORD_HASH') ? bcrypt('img/profile_1387129839.jpg') : 'img/profile_1387129839.jpg',
            'name'          => 'Osmar',
            'diploma'       => env('PASSWORD_HASH') ? bcrypt('pdf/diplomas/1231445345.pdf') : 'pdf/diplomas/1231445345.pdf',
            'email'         => 'osmar_cossin@email.com',
            'password'      => env('PASSWORD_HASH') ? bcrypt('12345') : '12345',
            'permission'    => 'app.adm'
        ]);*/

        Spiecie::create([
            'spiecie'       => 'Felis Catus',
            'niche'         => 1,
            'habitat'       => 'anywhere',
            'common_name'   => 'cat',
            'pic_id'        => bcrypt('spiecie_pic/cat001.jpg'),
            'authors'       => 'Osmar',
        ]);


    }
}
