<?php namespace App\Components\Facebook;


class FacebookDataResolver {

    protected $resolvedData;
    protected $filterKey;
    protected $filterValue;

    public function __construct($type, $data, $filter)
    {
        $this->resolveFilter($filter);
        $filterKey = $this->getFilterKey();
        $filterValue = $this->getFilterValue();
        $this->resolvedData =  call_user_func_array([$this, $type], compact('data', 'filterKey', 'filterValue'));
    }

    public function resolveFilter($filter)
    {
        $this->filterKey = key($filter);
        $this->filterValue = $filter[key($filter)];
    }

    public function posts($posts, $filterKey, $filterValue)
    {
        $postIds = [];
        foreach ($posts as $post) {
             if($post->$filterKey == $filterValue){
                $id_parts = explode("_", $post->id);
                $postIds[] = $id_parts;
            }
        }

        return $postIds;
    }

    public function albums($albums, $filterKey, $filterValue)
    {
        $albumsData = [];
        foreach($albums as $album)
        {
            $coverPhotos = [];
            if($album->$filterKey == $filterValue)
            {
                foreach($album->photos->data as $images)
                {
                    $coverPhoto = array_first($images->images, function($key, $value)
                    {
                        if(($value->height <= 540))
                        {
                            return true;
                        }
                    });
                    if(!empty($coverPhoto))
                    {
                        $coverPhotos[]= $coverPhoto->source;
                    }

                }

                $data = ['id' => $album->id,
                    'name' => $album->name,
                    'coverPhotos' => $coverPhotos];

                $albumsData[] = $data;
            }
        }
//        dd($albumsData);
        return $albumsData;
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









}