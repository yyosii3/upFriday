<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['term', 'language_id'];

    /**
     * Find translated object
     *
     * @return mixed
     */

    public function translation()
    {

        $translation = $this->hasMany('App\Translation', 'card_id');
        $direction = (count($translation->get())) ? 'card_id' : 'translation_id';

//        return $translation->get();

        if ($direction == 'card_id') {
//            $translation = $this->hasMany('App\Translation', 'card_id');
            return $translation->first()->belongsTo('App\Card', 'translation_id', 'id');
        } else {
            $translation = $this->hasMany('App\Translation', 'translation_id');
            return $translation->first()->belongsTo('App\Card', 'card_id', 'id');
        }
    }

    /**
     * @return mixed
     */

    public function translate()
    {
        return $this->translation()->first()->term;
    }

    public function synonym()
    {
//        return $this->belongsTo('App\Synonym', 'card_id');
    }

    public function antonym()
    {

    }
}
