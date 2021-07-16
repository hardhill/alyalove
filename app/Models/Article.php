<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\This;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','img','slug'];
    protected $dates = ['published_at'];
    protected Article $model;

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function state(){
        return $this->hasOne(State::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function getBodyPreview(){
        return Str::limit($this->body,100);
    }
    public function createdAtForHumans(){
        return $this->created_at->diffForHumans();
    }
    public function publishedAtForHumans(){
        return $this->published_at->diffForHumans();
    }
    public static function allPagination($n){
        return Article::with('tags','state')->orderBy('created_at','desc')->paginate($n);
    }
}
