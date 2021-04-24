<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @property int id
 * @property string codigo_doador
 * @property string nome
 * @property string email
 * @property string cpf
 * @property string senha
 *
 */
class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
    ];

    /**
     * Boot
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function(Usuario $usuario) {
            $usuario->senha = Hash::make($usuario->senha);
            $usuario->codigo_doador = base_convert(rand(100, 999) . Carbon::now()->timestamp, 10, 36);
        });
    }

    /**
     * Returns a hasMany relation between User and Organizations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizations()
    {
        return $this->hasMany(Organizacao::class);
    }
}
