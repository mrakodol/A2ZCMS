<?php

class SettingsPermissionsTableSeeder extends Seeder {

	public function run() {
		DB::table('permissions') -> delete();

		$permissions = array( 
						array('name' => 'manage_settings', 
						'display_name' => 'Manage settings',1),
					);

		DB::table('permissions') -> insert($permissions);

		//DB::table('permission_role')->delete();

		$permissions = array( array('role_id' => 1, 'permission_id' => 15), );

		DB::table('permission_role') -> insert($permissions);
	}

}
