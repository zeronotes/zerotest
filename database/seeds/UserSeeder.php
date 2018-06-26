<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'username' => 'admin',
        		'email' => 'admin@zdownload.vn',
        		'group_id' => 1,
        		'name' => 'Admin',
        		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        		'remember_token' => str_random(10),
        	],
        	[
        		'username' => 'editor',
        		'email' => 'editor@zdownload.vn',
        		'group_id' => 2,
        		'name' => 'Editor',
        		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        		'remember_token' => str_random(10),
        	],
        	[
        		'username' => 'author',
        		'email' => 'author@zdownload.vn',
        		'group_id' => 3,
        		'name' => 'Author',
        		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        		'remember_token' => str_random(10),
        	],
        	[
        		'username' => 'member',
        		'email' => 'member@zdownload.vn',
        		'group_id' => 4,
        		'name' => 'Member',
        		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        		'remember_token' => str_random(10),
        	],
        ];
        App\User::insert($users);
    }
}
