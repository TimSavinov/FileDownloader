<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Http\Requests\StoreFileRequest;
use App\Imports\ExImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(){
        return view('import-page');
    }

    /**
     * @param StoreFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(StoreFileRequest $request)
    {

        Excel::import(new ExImport, $request->file('file'));

        $count = Catalog::count();
        return back()->with('success', 'Your excel file has been successfully imported to the DataBase. 
        In general, you have ' . $count . ' records there');
    }
}
