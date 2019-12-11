<?php

namespace App\Presenters;

use EscapeWork\LaravelSteroids\Presenter;

class InvestmentPresenter extends Presenter
{

    public function picture($w = 500, $h = 200, $fit = 'fit')
    {
        if ($banner = $this->model->banner) {
            return media_path($this->model, 'banner', $w, $h, $fit);
        }
    }

    public function banner($fit = 'crop')
    {
        if ($banner = $this->model->banner) {
            $config = config('banners.types.'.$this->model->type);

            return asset('medias/banners/' . $banner . '?w=' . $config['width'] . '&h=' . $config['height'] . '&fit=' . $fit);
        }
    }

    public function vcto()
    {
        if ($this->model->vcto) {
            return $this->model->vcto->format('d/m/Y');
        }
    }

    // public function value()
    // {
    //     if ($this->model->value) {
    //         return $this->model->value->toLocaleString('d/m/Y');
    //     }
    // }

    public function type()
    {
        return config('banners.types.'.$this->model->type.'.title');
    }
}
