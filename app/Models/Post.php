<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // разное именование таблиц и модели
    //protected $primaryKey = 'post';
    // public $incrementing = false; // 
    // protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'rubric_id'];

    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

}
