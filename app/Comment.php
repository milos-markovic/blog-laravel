<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name','comment','article_id'
    ];    

    public function article(){
        return $this->belongsTo('App\Article');
    }

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }
}
