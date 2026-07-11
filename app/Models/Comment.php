<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable([
    'post_id',
    'author_name',
    'content',
])]
class Comment extends Model
{
use HasFactory;

  public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
