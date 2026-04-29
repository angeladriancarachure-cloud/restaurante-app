<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model {
    protected $table = 'platillos';
    protected $primaryKey = 'id_platillo';
    public $timestamps = false;
    protected $fillable = ['nombre_platillo','descripcion','id_categoria_platillo','precio','tiempo_preparacion','disponible','imagen_url'];
}
