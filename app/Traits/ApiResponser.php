<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{

    /**
     * Return success Response
     *
     * @param Object     $data data to response
     * @param statusCode $code status code for response
     *
     * @return \Illuminate\Http\Response
     */
    public function successResponse($data, $code)
    {
        return response()->json(['result' => $data, 'code' => $code], $code);
    }

    /**
     * Return error Response
     *
     * @param Object     $message data to response
     * @param statusCode $code    status code for response
     *
     * @return \Illuminate\Http\Response
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Show All data of a Collection
     *
     * @param Illuminate\Support\Collection $collection data to response
     * @param statusCode                    $code       status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }
        return $this->successResponse($collection, $code);
    }

    /**
     * Show specific data of Model
     *
     * @param Illuminate\Database\Eloquent\Model $instance instance of Model
     * @param statusCode                         $code     status code for response
     *
     * @return \Illuminate\Http\Response
     */
    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponse($instance, $code);
    }

    /**
     * Format Paginator input data
     *
     * @param Illuminate\Pagination\LengthAwarePaginator $paginator paginated collection
     *
     * @return Illuminate\Support\Collection
     */
    protected function formatPaginate(LengthAwarePaginator $paginator)
    {
        $paginator = $paginator->toArray();
        $result = [
            'paginator' => array_except($paginator, ['data']),
            'data' => $paginator['data']
        ];
        return collect($result);
    }
    
    /**
     * Paginator input data
     *
     * @param Illuminate\Support\Collection $collection data to response
     *
     * @return Illuminate\Support\Collection
     */
    protected function paginate(Collection $collection)
    {
        $rules = [
            'perpage' => 'integer|min:2|max:50'
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $prePage = config('define.limit_rows');
        if (request()->has('perpage')) {
            $prePage = request()->perpage;
        }
        $result = $collection->slice(($page - 1) * $prePage, $prePage);
        $paginated = new LengthAwarePaginator($result->values(), $collection->count(), $prePage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }
}
