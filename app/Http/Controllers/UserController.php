<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import_excel(){
        return view('import_excel');
    }
    public function import_excel_post(Request $request){
        Excel::import(new UserImport, $request->file('excel_file'));

        return redirect()->back();
    }
    public function export_excel(){
        return Excel::download(new ExportUser, 'user.xlsx');
    }
}
