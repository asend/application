<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles=new Role();
        $roles->name='delegue';
        $roles->description='Complete';
        $roles->save();

        $roles=new Role();
        $roles->name='membre';
        $roles->description='Incomplete';
        $roles->Role();

        $roles=new Role();
        $roles->name='coordinateur';
        $roles->description='Incomplete';
        $roles->save();
    }
}
