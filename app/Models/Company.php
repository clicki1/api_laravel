<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

  //  protected $guarded = false;
    protected $fillable = [
        'title',
        'description',
        'logo'
    ];
    protected $appends = ['rating_company'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRatingCompanyAttribute()
    {
        $arr_rating = [];
        foreach ($this->comments as $comment){
           // dd($comment->rating);
            $arr_rating[] = $comment->rating;
        }
        if(count($arr_rating)){
            return (array_sum($arr_rating) / count($arr_rating));
        }
        return 0;
    }
}
