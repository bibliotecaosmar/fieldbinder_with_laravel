<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Spiecie;
use App\Entities\Niche;
use App\Entities\Record;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Niche::create(['name' => 'plant']);
        Niche::create(['name' => 'animal']);
        Niche::create(['name' => 'insect']);
        Niche::create(['name' => 'mushroom']);

        $faker = Factory::create();

        foreach(range(1,50) as $index)
        {
            $pic_id = strval(rand(100,999));
            $niche = rand(1,4);

            Spiecie::create([
                'name'          => $faker->word,
                'niche_id'      => $niche,
                'habitat'       => $faker->country,
                'common_name'   => $faker->word,
                'pic_id'        => $pic_id,
                'authors'       => $faker->name
            ]);
        }

        foreach(range(1,10) as $profile)
        {
            $pic_id = strval(rand(100,999));

            User::create([
                'nickname'      => null,
                'birth'         => $faker->date,
                'pic_id'        => $pic_id,
                'name'          => $faker->name,
                'diploma'       => null,
                'email'         => $faker->email,
                'password'      => $faker->password
            ]);
        }
    }
}
