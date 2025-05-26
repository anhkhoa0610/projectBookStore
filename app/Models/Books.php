<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'books';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'book_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'summary',
        'published_date',
        'author_id',
        'publisher_id',
        'description',
        'price',
        'cover_image',
        'volume_sold',
    ];
}
