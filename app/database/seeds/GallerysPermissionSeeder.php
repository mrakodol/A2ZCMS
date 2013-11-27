<?php

class GallerysPermissionSeeder extends Seeder {

	public function run() {

		$permissions = array( 
					array('name' => 'manage_galleries', 
							'display_name' => 'Manage galleries',1), 
					array('name' => 'manage_gallery_images', 
							'display_name' => 'Manage gallery images',1), 
					array('name' => 'manage_gallery_imagecomments', 
							'display_name' => 'Manage gallery image comments',1),
					array('name' => 'menage_customform',
							'display_name' => 'Menage custom forms',1),
					array ('name' => 'post_gallery_comment' ,
							'display_name' => 'Post gallery comment',0));

		DB::table('permissions') -> insert($permissions);

		$permissions_role = array( 
								array('role_id' => 1, 'permission_id' => 10), 
								array('role_id' => 1, 'permission_id' => 11), 
								array('role_id' => 1, 'permission_id' => 12),
								array('role_id' => 1, 'permission_id' => 13),
								array('role_id' => 1, 'permission_id' => 14));

		DB::table('permission_role') -> insert($permissions_role);
	}

}

