<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $fillable = ['Name'];
    public $timestamps = false;
    public function games(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Games::class, 'IdGenre', 'IdGenre');
    }
}
