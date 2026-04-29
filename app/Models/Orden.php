<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model {
    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';
    public $timestamps = false;
    protected $fillable = ['id_mesa','id_cliente','tipo_orden','estado','subtotal','impuestos','total','metodo_pago','pagado','notas'];
}
