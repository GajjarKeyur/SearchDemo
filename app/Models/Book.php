<?php

namespace App\Models;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_name',
        'book_author',
        'book_price',
        'book_pages',
        'author_id',
    ];
    /**
     * Relationship
     *
     * @var array<int, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
