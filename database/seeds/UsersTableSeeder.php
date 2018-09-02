<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([
    		'name'	=>	'JohnDoe', 
    		'email'	=>	'mosaabmuhammed22@gmail.com', 
    		'password'	=>	bcrypt('123456'), 
            'admin' =>  1,
    	]);

        Profile::create([
            'user_id'    =>  $user->id,
            'avatar'    =>  'uploads/avatars/default.png',
            'about' =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quasi, nemo molestiae, velit voluptatem vel sed, commodi amet laudantium esse et? Labore perspiciatis, quaerat voluptatem repellendus libero sunt eius provident.',
            'facebook'  =>  'facebook.com',
            'youtube'   =>  'youtube.com', 
        ]);
    }
}
