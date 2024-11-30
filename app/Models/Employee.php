<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'joining_date',
        'gender',
        'department_id',
        'designation_id',
        'password',
        'about',
        'status',
        'image',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function vistor()
    {
        return $this->hasMany(Vistor::class, 'Employee_id');
    }
}

