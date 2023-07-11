<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $fillable = ['user_name','post_id', 'comment'];
    protected $table = 'comments';

    public function getCreatedAttribute() {
        return Carbon::parse($this->created_at);
    }

    public function post() : BelongsTo {
        return $this->belongsTo(Post::class);
    }

}
