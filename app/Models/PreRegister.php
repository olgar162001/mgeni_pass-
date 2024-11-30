<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'national_id',
        'gender',
        'employee_id',
        'expected_date',
        'expected_time',
        'comment',
        'address',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');  // Assuming 'employee_id' is the foreign key
    }

}

