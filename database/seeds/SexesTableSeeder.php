<?php

use Illuminate\Database\Seeder;
use App\Sex;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = new Sex();
        $sex->sex_name='Male';
        $sex->save();

        $sex = new Sex();
        $sex->sex_name='Female';
        $sex->save();
    }
}
