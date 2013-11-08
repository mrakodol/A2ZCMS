<?php

use Illuminate\Support\Facades\URL;
use Robbo\Presenter\PresentableInterface;

class PluginFunctions extends Eloquent implements PresentableInterface {

	protected $table = "plugin_functions";
	protected $softDelete = true;
	/**
	 * Returns a web function who is called
	 *
	 * @return string
	 */
	public function webfunction() {
		return nl2br($this -> function);
	}
	/**
	 * Returns a params for functions
	 *
	 * @return string
	 */
	public function params() {
		return nl2br($this -> params);
	}
	
	
	/**
	 * Get the pugin.
	 *
	 * @return Plugin
	 */
	public function plugin() {
		return $this -> belongsTo('Plugins', 'plugin_id');
	}

	/**
	 * Get the date the post was created.
	 *
	 * @param \Carbon|null $date
	 * @return string
	 */
	public function date($date = null) {
		if (is_null($date)) {
			$date = $this -> created_at;
		}

		return String::date($date);
	}

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at() {
		return $this -> date($this -> created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at() {
		return $this -> date($this -> updated_at);
	}

	public function getPresenter() {
		return new CommentPresenter($this);
	}

}
