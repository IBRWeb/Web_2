<?php namespace App\Components\Facebook;

use Facebook\FacebookRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Request;

class FacebookDataResolver
{

    protected $resolvedData;
    protected $filterKey;
    protected $filterValue;

    public function __construct($type, $data, $filter, $perPage)
    {
        if($filter)
        {
            $this->resolveFilter($filter);
            $filterKey = $this->getFilterKey();
            $filterValue = $this->getFilterValue();

        }
        $this->resolvedData = call_user_func_array([$this, $type], compact('data', 'filterKey', 'filterValue', 'perPage'));
    }

    public function resolveFilter($filter)
    {
        $this->filterKey = key($filter);
        $this->filterValue = $filter[key($filter)];
    }

    public function posts($posts, $filterKey, $filterValue, $perPage)
    {
        $postIds = [];
        foreach ($posts as $post) {
            if ($post->$filterKey == $filterValue) {
                $id_parts = explode("_", $post->id);
                $postIds[] = $id_parts;
            }
        }

        return $postIds;
    }

    public function albums($albums, $filterKey, $filterValue, $perPage)
    {
        $albumsData = [];
        foreach ($albums as $album) {
            if ($album->$filterKey == $filterValue) {
                $coverPhotos = $this->getImage($album);

                $data = ['id' => $album->id,
                    'name' => $album->name,
                    'coverPhotos' => $coverPhotos];

                $albumsData[] = $data;
            }
        }
        return $this->buildPagination($albumsData, $perPage);
    }

    public function albumPhotos($data, $filterKey, $filterValue, $perPage)
    {
        $checkUser = $this->checkUser($data);

        if($checkUser)
        {
           $images = $this->getImage($data);

            $data = [
                'images' => $images
            ];

            return $this->buildPagination($data, $perPage);
        }

        abort(404);
    }

    /**
     * @return mixed
     */
    public function getResolvedData()
    {
        return $this->resolvedData;
    }

    /**
     * @return mixed
     */
    public function getFilterKey()
    {
        return $this->filterKey;
    }

    /**
     * @return mixed
     */
    public function getFilterValue()
    {
        return $this->filterValue;
    }

    public function getImage($album)
    {
        foreach ($album->photos->data as $images) {
            $coverPhoto = array_first($images->images, function ($key, $value) {
                if (($value->height <= 540)) {
                    return true;
                }
            });
            if (!empty($coverPhoto)) {
                $coverPhotos[] = $coverPhoto;
            }
        }

        return $coverPhotos;
    }

    public function buildPagination($data, $perPage)
    {
        if(!$perPage)
        {
            $perPage = 15;
        }
        if(count($data) < $perPage)
        {
            $perPage = count($data);
        }

        return new Paginator($data, count($data), $perPage, null, ['path' => Request::url()]);

    }

    protected function checkUser($data)
    {
        if($data->from->id == getenv('FB_PAGE_ID'))
        {
            return true;
        }

        abort(404);

    }

}