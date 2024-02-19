<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Department extends Model
{
    use HasFactory;
    protected $table = 'Department';
    public $timestamps = false;
    protected $primaryKey='DepartmentId';
    protected $fillable=['name'];
    public function employees() {
        return $this->hasMany(Employee::class, 'id');
        }
}
