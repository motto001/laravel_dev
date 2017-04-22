<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
	
	/**
	* Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
		$langT= [
		["hun","hu","Hungarian","hu.png"]
		,["eng","en","English","_England.png"]
		,["ger","de","German","de.png"]
		];
		foreach($langT as $lang){
			$lang_assoc=["iso3"=>$lang[0],"iso2"=>$lang[1],"name"=>$lang[2],"flag"=>$lang[3]];
			DB::table('languages')->insert( $lang_assoc);
		}
		
	}
}
