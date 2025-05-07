<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'phone',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }
}