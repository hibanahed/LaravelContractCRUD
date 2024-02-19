<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Numero;

class Contrat extends Model
{
    use HasFactory;
    protected $table = 'Contrats';
    public $timestamps = false;
    protected $primaryKey='id';
    protected $fillable=['numero','data','heurs','prix'];
    public function numeros() {
        return $this->hasMany(Numero::class, 'id');
        }
        
}
