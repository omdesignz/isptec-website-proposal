<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ReflectionClass;

class ModelPermissionController extends Controller
{
    public function index()
    {
        $allModels = $this->getAllModels();

        dd($allModels);
  
        return view('admin.modelpermission.index', [
            'models' => $allModels
        ]);
    }

    public function getAllModels()
    {
        $modelList = [];
        $path = app_path('Models');
        $results = scandir($path);
 
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $result;
  
            if (is_dir($filename)) {
                $modelList = array_merge($modelList, getModels($filename));
            }else{
                // $modelList[] = substr($filename,0,-4);
                $f = 'App\\Models\\' .substr($filename,0,-4);
                $modelList[] = [
                    'name' => $f::MODEL_NAME,
                    'id' => $f,
                    'permissions' => [
                        'index' => true,
                        'create' => true,
                        'edit' => true,
                        'store' => true,
                        'update' => true,
                        'destroy' => true,
                    ]
                ];
            }
        }
  
        return collect($modelList)->filter(function($item) {
            return !is_null($item['name']);
        });
    }
}
