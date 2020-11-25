<?php


namespace App\Http\Resources;


use App\Http\Traits\QueryFilter;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CustomPaginatedResourceResponse extends PaginatedResourceResponse
{

    use QueryFilter;

    /**
     * Add the pagination information to the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function paginationInformation($request)
    {
        $paginated = $this->resource->resource;

        return [
            'links' => $this->paginationLinks($paginated),
            'meta' => $this->meta($paginated),
        ];
    }

    /**
     * Get the pagination links for the response.
     *
     * @param  LengthAwarePaginator  $paginated
     * @return array
     */
    protected function paginationLinks($paginated)
    {
        return [
            'first' => $this->getPaginationUrl($paginated, 1),
            'last' => $this->getPaginationUrl($paginated, $paginated->lastPage()),
            'prev' => $paginated->currentPage() > 1
                ? $this->getPaginationUrl($paginated, $paginated->currentPage() - 1)
                : null,
            'next' => $paginated->hasMorePages()
                ? $this->getPaginationUrl($paginated, $paginated->currentPage() + 1)
                : null,
        ];
    }

    /**
     * Gather the meta data for the response.
     *
     * @param  LengthAwarePaginator  $paginated
     * @return array
     */
    protected function meta($paginated)
    {
        return [
            'total' => $paginated->total(),
            'count' => $paginated->count(),
        ];
    }

    /**
     * Gather the meta data for the response.
     *
     * @param  LengthAwarePaginator  $paginated
     * @param integer $page
     * @return string
     */
    protected function getPaginationUrl($paginated, $page)
    {
        $page_request = $this->getPageInfo();
        $pagination = [
            'page' => [
                'offset' => ($page - 1) * $page_request['limit'],
                'limit' => $page_request['limit'],
            ]
        ];
        return $paginated->path()
            .(Str::contains($paginated->path(), '?') ? '&' : '?')
            .Arr::query(
                array_merge(
                    Arr::except(request()->query(), ['page']),
                    $pagination
                )
            );
    }

}
