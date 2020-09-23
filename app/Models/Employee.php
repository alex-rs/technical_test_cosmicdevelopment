<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'employees';
    /**
     * @var string[]
     */
    protected $fillable = [
        'reference_id',
        'date_of_birth',
        'image',
        'email',
        'first_name',
        'last_name',
        'title',
        'address',
        'country',
        'bio',
        'rating'
    ];



}
