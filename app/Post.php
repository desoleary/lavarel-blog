<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public static function archive()
    {
        return static::selectRaw("EXTRACT(year FROM created_at) AS year, 
                                     TRIM(TO_CHAR(created_at, 'Month')) AS month, 
                                     COUNT(*) AS publish")
            ->groupBy('year', 'month')
            ->orderByRaw('MIN(created_at) DESC')
            ->get()
            ->toArray();
    }

    public function scopeFilter($query, $filters)
    {
        if (array_key_exists('month', $filters)) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (array_key_exists('year', $filters)) {
            $query->whereYear('created_at', $filters['year']);
        }

        return $query;
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function addComment($body) {
        return $this->comments()->create(compact('body'));
    }
}
