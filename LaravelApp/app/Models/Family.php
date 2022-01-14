<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $guarded = [
        'libelle',
        'description',
    ];

    public function animal()
    {
        $this->hasMany(Animal::class, ('animal_id'));
    }
}
