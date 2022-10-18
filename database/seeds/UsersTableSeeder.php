<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $dev_role = Role::where('slug','developer')->first();
        $dev_perm = Permission::where('slug','create')->first();

        $developer = new User();
        $developer->first_name = 'Juma';
        $developer->last_name = 'Kassim';
        $developer->email = 'developer@makaziapp.com'; 
        $developer->phone_number = '+255713905621';
        $developer->password = bcrypt('developer');
        $developer->created_at = Carbon::now();
        $developer->updated_at = Carbon::now();
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);
        
        
    }
}
