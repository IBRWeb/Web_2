<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @property integer $id 
 * @property string $title 
 * @property string $path_to_file 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DevotionalPost[] $devotionalPosts 
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image wherePathToFile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereUpdatedAt($value)
 */
class Image extends Model {

	protected $filable =['title'];

	public function events() {

		return $this->hasMany('App\Event');
	}

	public function devotionalPosts() {
		return $this->hasMany('App\DevotionalPost');
	}
}
