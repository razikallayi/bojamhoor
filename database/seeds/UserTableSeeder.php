<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users=[[
    		'name' => config('whyte.admin.name'),
    		'username' => config('whyte.admin.username'),
    		'email' => config('whyte.admin.email'),
    		'password' => bcrypt(config('whyte.admin.password')),
    	],
    	[
    		'name' => 'Developer',
    		'username' => 'dev@whyte',
    		'email' => 'razi@whytecreations.in',
    		'password' => bcrypt('P@ssw0rd'),
    	]];

    	DB::table('users')->insert($users);
    }
}
