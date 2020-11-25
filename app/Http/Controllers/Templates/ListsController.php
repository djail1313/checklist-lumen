<?php


namespace App\Http\Controllers\Templates;

use App\Http\Controllers\Controller;
use App\Http\Resources\TemplateCollection;
use App\Http\Traits\QueryFilter;
use App\Models\Template;

class ListsController extends Controller
{

    use QueryFilter;

    public function execute()
    {
        return new TemplateCollection(
            $this->applyFilter(
                Template::with(['checklist', 'items']
            )
        ));
    }

}
