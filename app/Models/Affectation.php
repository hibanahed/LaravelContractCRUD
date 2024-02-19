<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Numero;
use App\Models\Employee;
class Affectation extends Model
{
    use HasFactory;
    protected $table = 'Affectation';
    public $timestamps = false;
    protected $primaryKey='id';
    protected $fillable=['idEmployee','idTelephone','active'];
    
}
