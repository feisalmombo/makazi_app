<?php

use Illuminate\Database\Seeder;
use App\Industry;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industry = new Industry();
        $industry->industry_name='Fundi';
        $industry->save();

        $industry = new Industry();
        $industry->industry_name='Mpishi';
        $industry->save();

        $industry = new Industry();
        $industry->industry_name='Mkulima';
        $industry->save();

        $industry = new Industry();
        $industry->industry_name='Mfugaji';
        $industry->save();

        $industry = new Industry();
        $industry->industry_name='Mwimbaji';
        $industry->save();

        $industry = new Industry();
        $industry->industry_name='Msusi';
        $industry->save();
    }
}
