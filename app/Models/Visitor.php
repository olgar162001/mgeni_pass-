<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'gender', 'employee_id', 
        'company_name', 'id_no', 'purpose', 'address', 'token', // Add token here
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}


