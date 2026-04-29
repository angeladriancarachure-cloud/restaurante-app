<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model {
    protected $table = 'gastos';
    protected $primaryKey = 'id_gasto';
    public $timestamps = false;
    protected $fillable = ['concepto','descripcion','monto','categoria','fecha_gasto','id_empleado','comprobante_url'];
}
