<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'text'
    ];

    public function getCreatedAttribute() {
        return Carbon::parse($this->created_at);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }
}
