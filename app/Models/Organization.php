<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property string email
 * @property string website
 * @property string phone_number
 */
class Organization extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
