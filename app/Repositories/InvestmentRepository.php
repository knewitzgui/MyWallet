<?php

namespace App\Repositories;

use App\Models\Investment;
use EscapeWork\LaravelSteroids\Repository;

class InvestmentRepository extends Repository
{

    public function __construct(Investment $model)
    {
        $this->setModel($model);
    }

    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function update($id, array $data)
    {
        $this->model = $this->model->findOrFail($id);
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function destroy($id)
    {
        $this->model = $this->model->findOrFail($id);
        $this->model->delete();

        return $this->model;
    }

    public function manager($request, $userid)
    {
        $query = $this->model->newQuery();

        if ($request->has('name')) {
            $query->where('name','LIKE', $request->name . '%');
        }

        return $query->orderBy('created_at', 'desc')
                     ->where('user_id', '=', $userid)
                     ->paginate();
    }

    public function saldo($userid){
      $query = $this->model->newQuery();

      return $query->where('user_id', '=', $userid)
                   ->sum('value');
    }
}
