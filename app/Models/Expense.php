<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;

class Expense extends Model
{

    /**
     * Table
     */
    protected $table = 'expenses';

    /**
     * Fillable fields
     */
     protected $fillable = [
         'name',
         'vcto',
         'value',
     ];

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

}
