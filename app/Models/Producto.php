<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'imagen', 'id_categoria', 'id_marca'];


    public function categoria()
    {
    return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function marca()
   {
    return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
   }

    public function usos()
   {
    return $this->belongsToMany(Uso::class, 'producto_uso', 'id_producto', 'id_uso');
   }

   public function agotado(): bool
   {
    return $this->stock <= 0;
   }
}