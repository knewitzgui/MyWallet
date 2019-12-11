<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;
use EscapeWork\LaravelSteroids\Presentable;
use App\Presenters\InvestmentPresenter;

class Investment extends Model
{
  use Presentable;
    /**
     * Table
     */
    protected $table = 'investments';

    /**
     * Fillable fields
     */
     protected $fillable = [
        'sigla',
         'name',
         'quantity',
         'total_value',
         'user_id'
     ];

     protected $presenter = InvestmentPresenter::class;

    public function setTotal_valueAttribute($total_value){

      $data = str_replace('.', '', $total_value);

      $this->attributes['total_value'] = str_replace(',', '.', $data);
    }

}
