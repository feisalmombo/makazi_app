<?php

use Illuminate\Database\Seeder;
use App\Dependant;

class DependantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependant = new Dependant();
        $dependant->dependant_name='1';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='2';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='3';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='4';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='5';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='6';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='7';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='8';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='9';
        $dependant->save();

        $dependant = new Dependant();
        $dependant->dependant_name ='10';
        $dependant->save();
    }
}
