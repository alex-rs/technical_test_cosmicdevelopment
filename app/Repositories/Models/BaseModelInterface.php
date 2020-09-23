<?php


namespace App\Repositories\Models;


use Illuminate\Database\Eloquent\Collection;

interface BaseModelInterface
{
    /**
     * @param int $id
     * @return Collection|null
     */
    function find(int $id) : ?Collection;

    /**
     * @return Collection|null
     */
    function all() : ?Collection;

    /**
     * @param array $attributes
     */
    function fill(array $attributes) : void;
}
