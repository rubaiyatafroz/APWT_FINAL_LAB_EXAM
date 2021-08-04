<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\ContractRequest;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        
           return view('student.index');
       
    }
    public function verify(){
        echo "posted";
    }
  
  
    public function course()
    {
        $courses = Course::all();
        return view('student.course')->with('courses',$courses);
    } 
    
    public function notice_index(Request $req){
        $contracts = Contact::all();
        return view('student.contract')->with('contracts',$contracts);
        //return view('buyer.postproject');       
    }
    
   public function insert_notice(ContractRequest $req)
   {
        $contract = new Contact;
        $contract->u_id=$req->u_id;
        $contract->message=$req->message;
        // $id = session('id');
        $contract->student_id = $req->student_id;
        $contract->save();
        return redirect('/create/contract');
   }
   

    public function student_index(Request $req){
        $students = Student::all();
        return view('student.createStudent')->with('students',$students);
           
    }
    public function insert_student(StudentRequest $req){
        $student = new Student;
        $student->username=$req->username;
        $student->fullname=$req->fullname;
        $student->password=$req->password;
        $student->email=$req->email;
        $student->dob=$req->dob;
        $student->address=$req->address;
        $student->country=$req->country;
        $student->p_num=$req->p_num;
        $student->c_id=$req->c_id;
        $student->save();
        return redirect('/student/create');  
    }
    public function student_details($id)
    {
        $student = Student::find($id) ;
        return view('student.student_details')->with('student',$student);
    }
    
    
   public function student_edit($id){
    $student = Student::find($id);
    return view('student.editStudent')->with('student', $student);
  }
  public function student_update(StudentRequest $req, $id)
  {
    $student = Student::find($id);
    $student->username=$req->username;
    $student->fullname=$req->fullname;
    $student->password=$req->password;
    $student->email=$req->email;
    $student->dob=$req->dob;
    $student->address=$req->address;
    $student->country=$req->country;
    $student->p_num=$req->p_num;
    $student->c_id=$req->c_id;
    $student->save();
    return view('student.student_details')->with('student', $student);
  }
   
  public function delete_student($id){
    $student = Student::find($id);
    return view('student.deleteStudent')->with('student', $student);
}

    public function destroy_student($id){
        
        $students = Student::all();
        Student::destroy($id);
        return view('dashboard.index')->with('students',$students);
        // return redirect()->route('student.createStudent');
    }

    public function notes()
    {
        $notes = Note::all();
        return view('student.notes')->with('notes',$notes);
    }     
    
    public function insert_notes(NoteRequest $req)
    {
        $note = new Note ;
        $newImageName=time().'-'.$req->name.'.'.$req->filename->extension();
        $test=$req->filename->move(public_path('protfolio_img'),$newImageName);
        $note->filename = $newImageName;
        $note->save();
        return redirect('/student/notes');      
    }
    function search_index()
    {
     return view('student.searchcourse');
    }

    function search_action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('courses')
         ->where('course_name', 'like', '%'.$query.'%')
         ->orWhere('instructor_name', 'like', '%'.$query.'%')
         ->orWhere('pricing', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('courses')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->course_name.'</td>
         <td>'.$row->instructor_name.'</td>
         <td>'.$row->pricing.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    
}
