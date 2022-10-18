<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    	$this->call(UsersTableSeeder::class); 
    	$this->call(IndustriesTableSeeder::class);
    	$this->call(SexesTableSeeder::class);
    	$this->call(MaritalstatusesTableSeeder::class);
    	$this->call(DependantsTableSeeder::class); 
    	$this->call(OwnershipstatusesTableSeeder::class);
        $this->call(MembershipsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
    	$this->call(DistrictsTableSeeder::class);
    	$this->call(WardsTableSeeder::class);
    }
}
