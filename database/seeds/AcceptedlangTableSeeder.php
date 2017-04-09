<?php

use Illuminate\Database\Seeder;

class AcceptedlangTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		$langT= [
		["hun","hu","Hungarian"]
		,["eng","en","English"]
		,["ger","de","German"]
		];
		foreach($langT as $lang){
			$lang_assoc=["iso3"=>$lang[0],"iso2"=>$lang[1],"name"=>$lang[2]];
			DB::table('acceptedlang')->insert( $lang_assoc);
		}
		
	}
}
