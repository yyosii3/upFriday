<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguagePair extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'language_language';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['language_id', 'related_id'];

    /**
     * Particular languages of the language pair
     * by language_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function language() {
        return $this->belongsTo('App\Language', 'language_id')->get()->first();
    }

    /**
     * Particular languages of the language pair
     * by related_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function related() {
        return $this->belongsTo('App\Language', 'related_id')->get()->first();
    }

    public function getLanguages()
    {
        $languages[] = $this->language();
        $languages[] = $this->related();

        return $languages;
    }
}
