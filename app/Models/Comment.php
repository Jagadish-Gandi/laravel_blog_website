<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'name', 'message', 'admin_response' ,'parent_id'];


        public function blog() {
            return $this->belongsTo(Blog::class);
        }
        
        public function replies() {
            return $this->hasMany(Comment::class, 'parent_id');
        }
}
