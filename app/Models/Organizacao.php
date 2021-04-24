<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 * @package App\Models
 *
 * @property int id
 * @property string nome
 * @property string cnpj
 * @property string|null descricao
 * @property string email
 * @property string|null site
 * @property string|null telefone
 * @property bool ativo
 * @property int|null usuario_id
 */
class Organizacao extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = ['active' => 'bool'];

    protected $table = 'organizacoes';

    /**
     * Returns a belongsTo relation with User Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Usuario::class);
    }
}
