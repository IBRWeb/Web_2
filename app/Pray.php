<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pray
 *
 * @property integer $id 
 * @property string $petitioner_name 
 * @property string $petitioner_phone 
 * @property string $petitioner_email 
 * @property string $petition 
 * @property boolean $visit 
 * @property string $address 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Pray whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray wherePetitionerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray wherePetitionerPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray wherePetitionerEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray wherePetition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray whereVisit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pray whereUpdatedAt($value)
 */
class Pray extends Model {

	protected $fillable = ['petitioner_name', 'petitioner_email', 'petitioner_phone', 'petition', 'visit', 'address'];
}
