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
 * @property string cnpj
 * @property string|null statement
 * @property string email
 * @property string|null website
 * @property string|null phone_number
 * @property bool active
 * @property string|null wirecard_account
 * @property int|null user_id
 */
class Organization extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = ['active' => 'bool'];

    /**
     * Returns a belongsTo relation with User Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
