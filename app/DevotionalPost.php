<?php namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\DevotionalPost
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property integer $image_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \App\Image $image
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereUpdatedAt($value)
 * @property string $slug
 * @method static \Illuminate\Database\Query\Builder|\App\DevotionalPost whereSlug($value)
 * @method static \App\DevotionalPost title($title)
 */
class DevotionalPost extends Model {

	protected $fillable = ['title', 'slug', 'content'];
	protected $table = 'devotional_posts';


	public function tags() {
		return $this->belongsToMany('App\Tag');
	}

	public function image(){
		return $this->belongsTo('App\Image');
	}

	public function scopeTitle($query, $title)
	{
        if($title != null){
            return $query->where('title', 'LIKE', "%$title%");
        }
    }

	

}
