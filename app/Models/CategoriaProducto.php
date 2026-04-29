<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model {
    protected $table = 'categorias_productos';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;
    protected $fillable = ['nombre_categoria','descripcion'];
}
