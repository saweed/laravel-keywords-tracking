<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['keyword', 'location_code', 'device', 'repetitions', 'user_id'];

    public function results()
    {
        return $this->hasMany(Result::class)->selectRaw("`domain`, `rank`, count(`domain`) as `counts`")->groupBy('domain')->groupBy('rank')->orderBy('domain', 'desc');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
