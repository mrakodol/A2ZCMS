<?php

class PluginfunctionTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('pluginfunctions')->truncate();
		
		$plugin_blog = Plugin::find(1) -> id;
		$plugin_gallery = Plugin::find(2) -> id;
		$plugin_contact = Plugin::find(3) -> id;
		
		$pluginfunctions = array( 
					array('title' => 'Login form', 
						'plugin_id' => 0,
						'function'=>'login',
						'params'=>'',
						'type' => 'sidebar',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime, ), 		
					array('title' => 'Search Form', 
						'plugin_id' => 0,
						'function'=>'search',
						'params'=>'',
						'type' => 'sidebar',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,), 
					array('title' => 'New gallerys', 
						'plugin_id' => $plugin_gallery,
						'function'=>'newGallerys',
						'params'=>'sort:asc;order:id;limit:5;',
						'type' => 'sidebar',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),
					array('title' => 'New blogs', 
						'plugin_id' => $plugin_blog,
						'function'=>'newBlogs',
						'params'=>'sort:asc;order:id;limit:5;',
						'type' => 'sidebar',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),
					array('title' => 'Content', 
						'plugin_id' => 0,
						'function'=>'content',
						'params'=>'',
						'type' => 'content',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),					
					array('title' => 'Display gallery', 
						'plugin_id' => $plugin_gallery,
						'function'=>'showGallery',
						'params'=>'id;sort;order;limit;',
						'type' => 'content',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),
					array('title' => 'Display blogs', 
						'plugin_id' => $plugin_blog,
						'function'=>'showBlogs',
						'params'=>'id;sort;order;limit;',
						'type' => 'content',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),
					array('title' => 'Display custom form', 
						'plugin_id' => $plugin_contact,
						'function'=>'showCustomFormId',
						'params'=>'id;',
						'type' => 'content',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime,),	
					array('title' => 'Side menu', 
						'plugin_id' => 0,
						'function'=>'sideMenu',
						'params'=>'',
						'type' => 'sidebar',
						'created_at' => new DateTime, 
						'updated_at' => new DateTime, ), 	
						);
						

		// Uncomment the below to run the seeder
		 DB::table('plugin_functions')->insert($pluginfunctions);
	}

}
