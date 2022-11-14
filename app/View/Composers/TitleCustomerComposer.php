<?php

namespace App\View\Composers;

use Illuminate\View\View;

class TitleCustomerComposer
{


    public function compose(View $view)
    {
        $arrUri = explode('/', request()->route()->uri());
        if ($arrUri[0] === 'detail') {
            $arrUrl = explode('/', url()->current());
            $title = ucfirst($arrUrl[4]);
        } else {
            $title = ucfirst(($arrUri[0] == '/' || $arrUri[0] == '') ? 'Home' : $arrUri[0]);
        }
        $view->with('title', $title);
    }
}
