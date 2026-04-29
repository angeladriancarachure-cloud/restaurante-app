<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model {
    protected $table = 'detalle_ordenes';
    protected $primaryKey = 'id_detalle_orden';
    public $timestamps = false;
    protected $fillable = ['id_orden','id_platillo','cantidad','precio_unitario','subtotal','notas_especiales'];

    public function platillo() {
        return $this->belongsTo(Platillo::class, 'id_platillo', 'id_platillo');
    }
}
