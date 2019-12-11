<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;
use EscapeWork\LaravelSteroids\Presentable;
use App\Presenters\ExtraPresenter;

class Extra extends Model
{
  use Presentable;
    /**
     * Table
     */
    protected $table = 'extras';

    /**
     * Fillable fields
     */
     protected $fillable = [
         'name',
         'vcto',
         'value',
         'user_id'
     ];

     protected $presenter = ExtraPresenter::class;

     /**
     * Dates
     */
    protected $dates = [
        'vcto',
    ];

    public function setValueAttribute($value){

      $data = str_replace('.', '', $value);

      $this->attributes['value'] = str_replace(',', '.', $data);
    }

    // public function setVctoAttribute($value){
    //
    //   $this->attributes['vcto'] = str_replace('/', '-', $value);
    // }

    public function setVctoAttribute($value)
    {
        $this->_setDateAttribute('vcto', $value);
    }

}
