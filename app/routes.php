<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('blogcomment', 'BlogComment');
Route::model('blogcategory', 'BlogCategory');
Route::model('blog', 'Blog');
Route::model('role', 'Role');
Route::model('settings', 'Settings');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Blog Comment Management
    Route::get('blogcomments/{blog}/commentsforblog', 'AdminBlogCommentsController@getCommentsForBlog')
        ->where('blog', '[0-9]+');
    Route::get('blogcomments/{blogcomment}/edit', 'AdminBlogCommentsController@getEdit')
        ->where('blogcomment', '[0-9]+');
    Route::post('blogcomments/{blogcomment}/edit', 'AdminBlogCommentsController@postEdit')
        ->where('blogcomment', '[0-9]+');
    Route::get('blogcomments/{blogcomment}/delete', 'AdminBlogCommentsController@getDelete')
        ->where('blogcomment', '[0-9]+');
    Route::post('blogcomments/{blogcomment}/delete', 'AdminBlogCommentsController@postDelete')
        ->where('blogcomment', '[0-9]+');
    Route::controller('blogcomments', 'AdminBlogCommentsController');
	
	 # Blog Category Management
    Route::get('blogcategorys/{blogcategory}/edit', 'AdminBlogCategorysController@getEdit')
        ->where('blogcategory', '[0-9]+');
    Route::post('blogcategorys/{blogcategory}/edit', 'AdminBlogCategorysController@postEdit')
        ->where('blogcategory', '[0-9]+');
    Route::get('blogcategorys/{blogcategory}/delete', 'AdminBlogCategorysController@getDelete')
        ->where('blogcategory', '[0-9]+');
    Route::post('blogcategorys/{blogcategory}/delete', 'AdminBlogCategorysController@postDelete')
        ->where('blogcategory', '[0-9]+');
    Route::controller('blogcategorys', 'AdminBlogCategorysController');

    # Blog Management
     Route::get('blogs/{blogcategory}/blogsforcategory', 'AdminBlogsController@getBlogsForCategory')
        ->where('blogcategory', '[0-9]+');
    Route::get('blogs/{blog}/show', 'AdminBlogsController@getShow')
        ->where('blog', '[0-9]+');
    Route::get('blogs/{blog}/edit', 'AdminBlogsController@getEdit')
        ->where('blog', '[0-9]+');
    Route::post('blogs/{blog}/edit', 'AdminBlogsController@postEdit')
        ->where('blog', '[0-9]+');
    Route::get('blogs/{blog}/delete', 'AdminBlogsController@getDelete')
        ->where('blog', '[0-9]+');
    Route::post('blogs/{blog}/delete', 'AdminBlogsController@postDelete')
        ->where('blog', '[0-9]+');
    Route::controller('blogs', 'AdminBlogsController');

    # User Management    
    Route::get('users/{role}/usersforrole', 'AdminUsersController@getUsersForRole')
        ->where('role', '[0-9]+');
    Route::get('users/{user}/show', 'AdminUsersController@getShow')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete')
        ->where('user', '[0-9]+');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete')
        ->where('role', '[0-9]+');
    Route::controller('roles', 'AdminRolesController');

	# Settings
    Route::get('settings', 'AdminSettingsController@getIndex');
    Route::post('settings', 'AdminSettingsController@postIndex');
	
    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
	
	
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset')
    ->where('token', '[0-9a-z]+');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset')
    ->where('token', '[0-9a-z]+');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit')
    ->where('user', '[0-9]+');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Filter for detect language
Route::when('contact-us','detectLang');

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

# Posts - Second to last set, match slug
Route::get('{postSlug}', 'BlogController@getView');
Route::post('{postSlug}', 'BlogController@postView');

/*Route::get('/', function()
{
	return View::make('hello');
});*/

# Index Page - Last route, no matches
Route::get('/', array('before' => 'detectLang','uses' => 'BlogController@getIndex'));

