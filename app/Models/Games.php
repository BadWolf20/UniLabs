<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class Games extends Model
{
    protected $primaryKey = 'IdGame';
    protected $fillable = ['Name', 'Description', 'Mark', 'Date', 'Watch', 'Memory','Video', 'Downloads', 'Image', 'Language', 'IdPublisher', 'IdGenre', 'IdRequirement'];
    public $timestamps = false;
    use HasFactory;
       public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Genres::class, 'IdGenre', 'IdGenre');
    }
    public function publisher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Publishers::class, 'IdPublisher', 'IdPublisher');
    }
    public function requirements(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Requirements::class, 'IdRequirement', 'IdRequirement');
    }


}
