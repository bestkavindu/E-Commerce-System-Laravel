<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository

{
    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->active()->get();
    }

    public function paginate($perPage = 15): LengthAwarePaginator
    {
        return $this->model->active()->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->active()->find($id);
    }

    public function search($search, $perPage = 2): LengthAwarePaginator
    {
        return $this->model->active()
            ->where('name', 'like', '%' . $search . '%')
            ->paginate($perPage);
    }

    public function filterByCategories($categories = [], $search = '', $perPage = 15): LengthAwarePaginator
    {
        $query = $this->model->active();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);

        }

        return $query->paginate($perPage);
    }
}
