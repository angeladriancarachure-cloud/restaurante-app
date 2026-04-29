<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CategoriaPlatillo extends Model {
    protected $table = 'categorias_platillos';
    protected $primaryKey = 'id_categoria_platillo';
    public $timestamps = false;
    protected $fillable = ['nombre_categoria','descripcion'];
}
