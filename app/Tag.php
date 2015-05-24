<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tag
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DevotionalPost[] $devotionalPosts
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereUpdatedAt($value)
 */
class Tag extends Model {

	protected $fillable = ['name', 'description'];

	public function devotionalPosts() {

		return $this->belongsToMany('App\DevotionalPost');

	}
}
