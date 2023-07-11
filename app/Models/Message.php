<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'messages';
    protected $guarded = false;
    protected $fillable = ['fio', 'address', 'phone', 'email'];

    public function getCreatedAttribute() {
        return Carbon::parse($this->created_at);
    }
}
