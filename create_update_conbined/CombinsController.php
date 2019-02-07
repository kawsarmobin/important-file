<?php
namespace App\Http\Controllers\Admin\StudentGPA;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Student;
use App\Models\Admin\StudentGPA;
use App\Http\Controllers\Controller;
class StudentGPAController extends Controller
{
    public function create($student_id)
    {
        $studentGPA = '';
        if ($student_gpa = StudentGPA::where('student_id', $student_id)->first()) {
            $studentGPA = $student_gpa;
        }
        return view('admin.result.gpa.create')
                ->with('student_id', $student_id)
                ->with('student_gpa', $studentGPA);
    }
    public function store(Request $request)
    {
        $student_id = $request->student_id;
        $studentGPA = StudentGPA::where('student_id', $student_id)->first();
        if ($studentGPA) {
            // Update...
            $studentGPA->semester_1_gpa = $request->semester_1_gpa;
            $studentGPA->semester_2_gpa = $request->semester_2_gpa;
            $studentGPA->semester_3_gpa = $request->semester_3_gpa;
            $studentGPA->semester_4_gpa = $request->semester_4_gpa;
            $studentGPA->semester_5_gpa = $request->semester_5_gpa;
            $studentGPA->semester_6_gpa = $request->semester_6_gpa;
            $studentGPA->semester_7_gpa = $request->semester_7_gpa;
            $studentGPA->semester_8_gpa = $request->semester_8_gpa;
            if ($studentGPA->save()) {
                Session::flash('success', 'Student GPA update successfull');
            }
        } else {
            // Create...
            $studentGPA = new StudentGPA();
            $studentGPA->student_id = $request->student_id;
            $studentGPA->semester_1_gpa = $request->semester_1_gpa;
            $studentGPA->semester_2_gpa = $request->semester_2_gpa;
            $studentGPA->semester_3_gpa = $request->semester_3_gpa;
            $studentGPA->semester_4_gpa = $request->semester_4_gpa;
            $studentGPA->semester_5_gpa = $request->semester_5_gpa;
            $studentGPA->semester_6_gpa = $request->semester_6_gpa;
            $studentGPA->semester_7_gpa = $request->semester_7_gpa;
            $studentGPA->semester_8_gpa = $request->semester_8_gpa;
            if ($studentGPA->save()) {
                Session::flash('success', 'Student GPA create successfull');
            }
        }
        return redirect()->route('student.index');
    }
}
