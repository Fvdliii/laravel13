<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['name', 'nim'])]

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    // // yang boleh di isi
    // protected $fillable = ['name','nim'];

    // // yang tidak boleh
    // protected $guarded = ['id'];
}
