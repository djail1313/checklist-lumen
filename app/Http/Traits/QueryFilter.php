<?php


namespace App\Http\Traits;


use Illuminate\Database\Eloquent\Builder;

trait QueryFilter
{

    protected function getPageQuery($query, $default)
    {
        if ($page_request = request()->query('page')) {
            return isset($page_request[$query])
                ? $page_request[$query]
                : $default;
        }
        return $default;
    }

    protected function getPageInfo()
    {
        $offset = $this->getPageQuery('offset', 0);
        $limit = $this->getPageQuery('limit', 10);
        $page = ($offset/$limit) + 1;

        return compact(['offset', 'limit', 'page']);
    }

    protected function getFieldsQuery()
    {
        $columns = ['*'];
        if ($fields = request()->query('fields')) {
            $columns = explode(',', $fields);
        }
        return $columns;
    }

    protected function applyFilter(Builder $query)
    {
        $page_info = $this->getPageInfo();
        $columns = $this->getFieldsQuery();

        return $query->paginate(
            $page_info['limit'],
            $columns,
            'page',
            $page_info['page']);
    }

}
