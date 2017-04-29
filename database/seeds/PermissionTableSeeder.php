<?php
use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'item-list',
        		'display_name' => 'Display Item Listing',
        		'description' => 'See only Listing Of Item'
        	],
        	[
        		'name' => 'item-create',
        		'display_name' => 'Create Item',
        		'description' => 'Create New Item'
        	],
        	[
        		'name' => 'item-edit',
        		'display_name' => 'Edit Item',
        		'description' => 'Edit Item'
        	],
        	[
        		'name' => 'item-delete',
        		'display_name' => 'Delete Item',
        		'description' => 'Delete Item'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }

$permission_role = array(
  array('permission_id' => '1','role_id' => '1'),
  array('permission_id' => '1','role_id' => '2'),
  array('permission_id' => '2','role_id' => '1'),
  array('permission_id' => '2','role_id' => '2'),
  array('permission_id' => '3','role_id' => '1'),
  array('permission_id' => '4','role_id' => '1'),
  array('permission_id' => '4','role_id' => '2'),
  array('permission_id' => '5','role_id' => '2'),
  array('permission_id' => '6','role_id' => '1'),
  array('permission_id' => '7','role_id' => '1')
);

	foreach($permission_role as $dataS){
			//$lang_assoc=["iso3"=>$lang[0],"iso2"=>$lang[1],"name"=>$lang[2],"flag"=>$lang[3]];
			DB::table('permission_role')->insert( $dataS);
		}

$role_user = array(
  array('user_id' => '1','role_id' => '1'),
  array('user_id' => '2','role_id' => '2')
);

	foreach($role_user as $dataS){
			//$lang_assoc=["iso3"=>$lang[0],"iso2"=>$lang[1],"name"=>$lang[2],"flag"=>$lang[3]];
			DB::table('role_user')->insert( $dataS);
		}

$roles = array(
  array('id' => '1','name' => 'admin','display_name' => NULL,'description' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '2','name' => 'user admin','display_name' => 'useradmin','description' => 'jhdj','created_at' => '2017-04-02 18:42:53','updated_at' => '2017-04-02 18:42:53')
);

foreach($roles as $dataS){
			//$lang_assoc=["iso3"=>$lang[0],"iso2"=>$lang[1],"name"=>$lang[2],"flag"=>$lang[3]];
			DB::table('roles')->insert( $dataS);
		}

    }
}
