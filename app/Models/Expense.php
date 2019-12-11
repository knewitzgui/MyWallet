<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;
use EscapeWork\LaravelSteroids\Presentable;
use App\Presenters\ExpensePresenter;

class Expense extends Model
{
  use Presentable;
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
         'user_id'
     ];

     protected $presenter = ExpensePresenter::class;

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
