<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $roles = ModelsRole::get();
        return view('components.layouts.navigation', compact('roles'));
    }
}
