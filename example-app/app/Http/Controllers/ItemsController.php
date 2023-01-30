<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemsController extends Controller
{
    public function index()
    {
        $array = [
            [   'id' => 1,
                'name' => "Obuolys",
                'price' => 1.29
            ],
            [
                'id' => 2,
                'name' => "Bananas",
                'price' => 1,79
            ],
            [
                'id' => 3,
                'name' => "Apelsinas",
                'price' => 1.59
            ]
        ];

        return view('items/index', [
            'products' => $array,
        ]);
    }

    public function show($id)
    {
        $array = [
            [   'id' => 1,
                'name' => "Obuolys",
                'price' => 1.29
            ],
            [
                'id' => 2,
                'name' => "Bananas",
                'price' => 1.79
            ],
            [
                'id' => 3,
                'name' => "Apelsinas",
                'price' => 1.59
            ]
        ];
//        if (isset($id)) {
//            return view('items/show', [
//                'products' => $array
//            ]);
//        } else {
//            return 'Tokios prekės nėra';
//        }

//        $product = null;

        foreach ($array as $item) {
            if ($item['id'] == $id) {
                return view('items/show', $item);
            }
        }
        return response()->view('items/error', [], 404);
    }
}
