<?php


namespace App\Repositories\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class EmployeeRepository implements BaseModelInterface
{

    /**
     * @var Model
     */
    protected Model $model;

    /**
     * EmployeeRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Collection|null
     */
    function find(int $id): ?Collection
    {
        return $this->model->find($id);
    }

    /**
     * @return Collection|null
     */
    function all(): ?Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     */
    function fill(array $attributes): void
    {
        try {
            $this->model->create($attributes);
        }catch (QueryException $exception){
            //Handle unq data fields.
        }
    }

    /**
     * Clear DB before each emp. load
     */
    public function dump() : void
    {
        $this->model->truncate();
    }
}
