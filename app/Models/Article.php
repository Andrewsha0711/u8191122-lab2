<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model{
    use HasFactory;

    protected $table = 'articles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $filltable = [
        'name',
        'symbol_code',
        'content',
        'creation_time',
        'author'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 
            'articles_tags', 
            'article_id', 
            'tag_id');
    }
}