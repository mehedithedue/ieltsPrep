<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{

    protected $table = 'studies';
    protected $fillable = [
        'practise_book',
        'book_details',
        'test_no',
        'part_no',
        'full_marks',
        'score',
        'band',
        'comments',
        'completed_at',
    ];
}
