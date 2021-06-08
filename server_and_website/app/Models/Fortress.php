<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fortress extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fortress';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_count',
        'last_visit',
        'date'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function fortressUser()
    {
        return $this->belongsTo('App\Models\FortressUser');
    }
}
