<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre','apellido','email','telefono','fecha_contratacion','salario','id_rol','foto'];

    public function rol() {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
}
