<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Affectation;
use App\Models\Numero;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'Employee';
    public $timestamps = false;
    protected $primaryKey='id';
    protected $fillable=['name','lastName','number','DepartmentId'];
    public function departments() {
        return $this->belongsTo(Department::class, 'DepartmentId');
        }
        public function numeros() {
            return $this->belongsToMany(Numero::class, 'affectation');
            }
    
}
