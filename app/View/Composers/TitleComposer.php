<?php

namespace App\View\Composers;

use Illuminate\View\View;

class TitleComposer
{


    public function compose(View $view)
    {
        $arrPrefix = explode('/', request()->route()->getPrefix());
        $arrPrefix = array_values(array_diff($arrPrefix, ["", "admin"]));
        $title = ucfirst($arrPrefix[0] ?? 'Dashboard');
        $view->with('title', $title);
    }
}
