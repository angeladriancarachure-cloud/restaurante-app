<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model {
    protected $table = 'reservaciones';
    protected $primaryKey = 'id_reservacion';
    public $timestamps = false;
    protected $fillable = ['id_cliente','id_mesa','fecha_reservacion','hora_reservacion','numero_personas','estado','notas'];
}
