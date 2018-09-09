<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Student;
use App\Result;
use App\Room;
use App\Teacher;
 
class PdfController extends Controller

    {

           /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
 
        public function index(Request $request) {

            $users = Student::where('results', 1)
                    ->orderby('created_at', 'desc')
                    ->get();
            return view('pdf.index',['users' => $users]);
            
        }

        public function viewPDF($id){
                  //find the user id from the url
             $user = Student::find($id);

             $result= Result::where('adm_no',$user->adm_no)->first();

             $tcher = Room::where('class_name', $user->room)->first();

             $teacher = Teacher::where('id_no',$tcher->class_teacher)->first();

            //  $total= Result::where('adm_no',$user->adm_no)->sum();

            $grades = new Result;
                //load data to a view pdf format
                $view = View('pdf.single', 
                [
                    'user' => $user,
                    'result'=>$result,
                    'grades' =>$grades,
                    'teacher' => $teacher,
                    'details' =>$result
                ]);

                $pdf = \App::make('dompdf.wrapper');

                //enable the html to read the pdf
                $pdf->loadHTML($view->render());

                //stream data to the html page
                return $pdf->stream();
            }


        public function report($id)
        {
            //find the user id from the url
            $user = Student::find($id);

            $result= Result::where('adm_no',$user->adm_no)->first();

            $tcher = Room::where('class_name', $user->room)->first();

            $teacher = Teacher::where('id_no',$tcher->class_teacher)->first();

            //  $total= Result::where('adm_no',$user->adm_no)->sum();

                  $grades = new Result;


                //load data to the pdf
                $pdf = PDF::loadView('pdf.single', 
                [
                    'user' => $user,
                    'result'=>$result,
                    'grades' =>$grades,
                    'teacher' => $teacher,
                ]);

                    //download the pdf
                return $pdf->download($user->name.'-report_card.pdf');
        }
        
        public function reports(Request $request)
        {       
            //find the user id from the url
             $users = Student::all();
             
             //if the user wants to download
            if($request->view_type === 'download') {

            

            } 
     
        }
    }

