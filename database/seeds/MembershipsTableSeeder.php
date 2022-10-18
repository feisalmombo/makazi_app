<?php

use Illuminate\Database\Seeder;
use App\Membership;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = new Membership();
        $membership->membership_name='General User';
        $membership->save();

        $membership = new Membership();
        $membership->membership_name='Trader';
        $membership->save();

        $membership = new Membership();
        $membership->membership_name='Vendor';
        $membership->save();

        $membership = new Membership();
        $membership->membership_name='Other';
        $membership->save();
    }
}
