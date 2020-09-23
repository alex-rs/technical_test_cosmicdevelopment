<?php

namespace App\Http\Controllers;

use App\Repositories\Models\ModelFactory;

class Employee extends Controller
{
    /**
     * @param ModelFactory $factory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(ModelFactory $factory)
    {
        return view('employees_list', ['employees' => $factory::create('employee')->all()]);
    }
}
