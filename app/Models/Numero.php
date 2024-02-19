<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrat;
use App\Models\Affectation;
use App\Models\Employee;

class Numero extends Model
{
    use HasFactory;
    protected $table = 'Numero';
    public $timestamps = false;
    protected $primaryKey='id';
    protected $fillable=['number','status','idContrat'];
    public function contrats() {
        return $this->belongsTo(Contrat::class, 'id');
        }
        public function employees() {
            return $this->belongsToMany(Employee::class, 'affectation');
            }
    
}
