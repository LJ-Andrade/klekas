<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use App\User;

class invoiceController extends Controller
{
    // Exports ALL data of a model
    public function exportViewPdf($view, $params, $model, $filename)
    {   
        $prefix = "App";
        $modelname = $prefix . "\\". $model;
        $items = $modelname::all();
        $pdf = PDF::loadView($view, array('items' => $items));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download($filename.'.pdf');
    }
}
