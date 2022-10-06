<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeRecord extends Model
{
    use HasFactory;
    protected $table='empolyee_injury';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
