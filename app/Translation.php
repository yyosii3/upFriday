<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'card_card';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_id', 'translation_id'];

    /**
     * Card of the translation ID
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card() {
        return $this->belongsTo('App\Card', 'translation_id', 'id');
    }
}
