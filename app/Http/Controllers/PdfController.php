<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Student;
 
class PdfController extends Controller

    {
 
        public function index(Request $request) {
            $users = Student::all();
            return view('pdf.index',['users' => $users]);
        }
        
        public function report(Request $request)
        {
             $users = Student::all();
             
            if($request->view_type === 'download') {

                $pdf = PDF::loadView('pdf.report', ['users' => $users]);
                return $pdf->download('users.pdf');

            } else {
                $view = View('pdf.report', ['users' => $users]);
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view->render());
                return $pdf->stream();
            }
     
        }
    }

