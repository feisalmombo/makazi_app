<?php

use Illuminate\Database\Seeder;
use App\Ownershipstatus;

class OwnershipstatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownershipstatus = new Ownershipstatus();
        $ownershipstatus->ownershipstatus_name='Father';
        $ownershipstatus->save();

        $ownershipstatus = new Ownershipstatus();
        $ownershipstatus->ownershipstatus_name='Mother';
        $ownershipstatus->save();

        $ownershipstatus = new Ownershipstatus();
        $ownershipstatus->ownershipstatus_name='Guardian';
        $ownershipstatus->save();

        $ownershipstatus = new Ownershipstatus();
        $ownershipstatus->ownershipstatus_name='Other';
        $ownershipstatus->save();
    }
}
