<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Poland'=>['Warsaw', 'Krakow', 'Lodz'],
            'Ukraine'=>['Kyiv', 'Lviv', 'Zaporizhzhya'],
            'Hungary'=>['Budapest', 'Debrecen', 'Miskolc'],
            'Germany'=>['Berlin', 'Hamburg', 'Munich']
        ];
        $languages = [
            'Polish', 'Belorussian', 'Czech', 'Lithuanian', 'German', 'Slovak', 'Russian',
            'Ukrainian',
            'Hungarian', 'Croatian', 'Romanian',
            'Danish', 'Turkish', 'Kurdish',
        ];

        $relations = [
            1 => [1,2],
            2 => [1,2,3],
            3 => [1,3,4],
            4 => [8,7],
            5 => [8,1],
            6 => [8,7],
            7 => [9,10],
            8 => [9,11],
            9 => [9,10,11],
            10 => [5,12],
            11 => [5,12,13],
            12 => [5,13,14],
        ];
        /*
         * Polish, Belorussian, Czech, Lithuanian, German, Slovak, Russian,
         * Ukrainian, Russian, Polish
         * Hungarian, Croatian, German, Romanian
         * German, Danish, Turkish, Kurdish, Polish
         */
        //DB::table('')->delete();
        //DB::table('users')->delete();
        //DB::table('users')->delete();

        foreach ($countries as $country=>$cities)
        {
            DB::table('countries')->insert([
                'country' => $country,
            ]);
            $country_id = DB::table('countries')
                ->where('country', '=', $country)->select('id')->first();
            foreach ($cities as $city)
            {
                DB::table('cities')->insert([
                    'city' => $city,
                    'country_id' => $country_id->id,
                ]);
            }
        }

        foreach ($languages as $language)
        {
            DB::table('languages')->insert([
                'language' => $language,
            ]);
        }

        foreach ($relations as $city_id => $languages_id)
        {
            foreach ($languages_id as $language_id)
            {
                DB::table('city_language')->insert([
                    'city_id' => $city_id,
                    'language_id' => $language_id,
                ]);
            }
        }

        /*for ( $i = 0; $i < 20; $i++ )
        {
            $city = str_random(5);
            $country = str_random(8);
            $language = str_random(12);

            DB::table('countries')->insert([
                'country' => $country,
            ]);

            DB::table('languages')->insert([
                'language' => $language,
            ]);

            $country_id = DB::table('countries')->where('country', '=', $country)->select('id')->first();
            $language_id = DB::table('languages')->where('language', '=', $language)->select('id')->first();
            DB::table('cities')->insert([
                'city' => $city,
                'country_id' => $country_id->id,
                'language_id' => $language_id->id,
            ]);

        }*/
    }
}
