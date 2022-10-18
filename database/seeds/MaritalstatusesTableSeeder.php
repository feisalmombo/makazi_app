<?php

use Illuminate\Database\Seeder;
use App\MaritalStatus;

class MaritalstatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maritalstatus = new MaritalStatus();
        $maritalstatus->maritalstatus_name='Married';
        $maritalstatus->save();

        $maritalstatus = new MaritalStatus();
        $maritalstatus->maritalstatus_name='Divorced';
        $maritalstatus->save();

        $maritalstatus = new MaritalStatus();
        $maritalstatus->maritalstatus_name='Single';
        $maritalstatus->save();
    }
}
