<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Uso extends Model
{
    protected $table = 'uso';
    protected $primaryKey = 'id_uso';
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_uso', 'id_uso', 'id_producto');
    }
}