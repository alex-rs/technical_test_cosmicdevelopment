<?php


namespace App\Repositories\Models;


class ModelFactory
{
    /**
     * @param string $model
     * @return BaseModelInterface|null
     */
    public static function create(string $model) : ?object
    {
        try {
            $eloquent = (new \ReflectionClass('\\App\\Models\\' . ucfirst($model)))->newInstance();
            return (new \ReflectionClass('\\App\\Repositories\\Models\\' . ucfirst($model) . 'Repository'))->newInstanceArgs(['model' => $eloquent]);
        } catch (\ReflectionException $e) {
            //Log $e
            return null;
        }
    }
}
