<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguagePairUser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'language_language_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['language_language_id', 'user_id'];

    /**
     * A language pair is owned by an user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Language pair by user belongs to one language pair
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function languagePair() {
        return $this->belongsTo('App\LanguagePair', 'language_language_id')->first();
    }
}
