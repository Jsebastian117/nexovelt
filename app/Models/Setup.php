<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    protected $table = 'setup';
    protected $primaryKey = 'id_setup';
    public $timestamps = false;

    protected $fillable = ['id_usuario', 'id_uso', 'nombre','fecha' ];

    protected function casts(): array
    {
        return [
            'fecha' => 'datetime',
        ];
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function uso()
    {
        return $this->belongsTo(Uso::class, 'id_uso', 'id_uso');
    }
   public function productos()
    {
        return $this->belongsToMany(Producto::class, 'setup_productos', 'id_setup', 'id_producto');
    }
    
    public function total(): int
    {
        return $this->productos->sum('precio');
    }

}

