<?php

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
		$usrT= [
		["motto","mott001@gmail.com","$2y$10$daMWibOePQug61k6jvCcZOCQr2tPNejKd3u2rWjxtL5w8bRYGLSsu"]
		,["menku","menkuottovgmail.com","$2y$10$daMWibOePQug61k6jvCcZOCQr2tPNejKd3u2rWjxtL5w8bRYGLSsu"]
		];
		foreach($usrT as $usr){
			$usr_assoc=["name"=>$usr[0],"email"=>$usr[1],"password"=>$usr[2]];
			DB::table('users')->insert( $usr_assoc);
		}
		
	}
}
