<?php
use App\Subject;


Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('teacher')->user();

    //dd($users);
    // $subjects = App\Subject::all();

    
    $subjects_list = DB::table('teacher_subjects')
                        ->leftJoin('teachers', 'teacher_subjects.id_no', '=', 'teachers.id_no')
                        ->get();

        // $subjects_list = DB::table('teachers')
        //                     ->join('teacher_subjects', 'teachers.id_no', '=', 'teacher_subjects.id_no')
        //                     ->join('subjects', 'teacher_subjects.ref_no', '=', 'subjects.ref_no')
        //                     ->select('teacher_subjects.*', 'teachers.name', 'subjects.subject_name')
        //                     ->get();

    return view('/teacher/home')
            ->with('subjects_list', $subjects_list);

})->name('home');

