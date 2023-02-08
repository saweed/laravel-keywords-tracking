<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['keyword', 'location_code', 'device', 'repetitions'];

    public function results()
    {
        // return $this->hasMany(Result::class);
        // return $this->hasMany(Result::class)->selectRaw("CONCAT(`domain`, '-', `rank`) as `concated`, `domain`, `iteration`, `rank`, count(`domain`) as `counts`")->groupBy('concated')->orderBy('domain', 'desc');
        return $this->hasMany(Result::class)->selectRaw("`domain`, `rank`, count(`domain`) as `counts`")->groupBy('domain')->groupBy('rank')->orderBy('domain', 'desc');

    }
}
