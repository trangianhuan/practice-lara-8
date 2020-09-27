<?php
if (! function_exists('createDataForModel')) {
    function createDataForModel($model, $data = [])
    {
        return $model::create($data);
    }
}