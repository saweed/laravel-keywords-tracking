<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['domain', 'rank', 'search_id', 'iteration'];

    /**
     * Get the search that owns the result.
     */
    public function search()
    {
        return $this->belongsTo(Search::class);
    }
}
