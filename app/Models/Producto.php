<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    protected $fillable = ['nombre_producto','descripcion','id_categoria','unidad_medida','stock_actual','stock_minimo','precio_unitario','id_proveedor'];
}
