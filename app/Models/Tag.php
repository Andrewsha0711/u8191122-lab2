<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    use HasFactory;

    protected $table = 'tags';

    protected $filltable = [
        'name',
        'symbol_code'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,
            'articles_tags', 
            'tag_id', 
            'article_id');
    }
}