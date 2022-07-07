<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Contracts\HasAbilities;

use App\Models\Notice;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;//file model used for update mehthod
use Illuminate\Support\Facades\Stroage;

class NoticeController extends Controller
{
    //
    public function index()
    {
        //$notices=Notice::all()->sortByDesc('created_at');
        $notices = Notice::orderByDesc('created_at')->paginate(2);
        return view('viewNotices',compact('notices'));
    }

    public function studentNotice()
    {
        //$notices=Notice::all()->sortByDesc('created_at');
        //$notices = Notice::all()->sortByDesc('created_at');
        $notices = Notice::orderByDesc('created_at')->paginate(2);
        return view('studentNotice',compact('notices'));
        //return view('studentNotic')->with('messages', $notices);
    }

    public function add()
    {
        return view('addNotices');

    }
    //public $Id=1;
    public function store(Request $request,$Id)
    {
        /*$input=$request-> all();
        Books::create($input);
        return  redirect('/');*/

        /*$request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);


        $data=new Notice();
        $image=$request->image;
       
        $filename=time().'.'.$image->getClientOriginalExtension();
        $filename=time().'.'.$image->getClientOriginalName();

        $request->image->move('pdfs',$filename);

       

        $data->image=$image;
        $data->title=$request->title;
        $data->description=$request->description;
     
        $data->save();
        //return  redirect('/');
        return redirect()->back()->with('message', 'Thank you!   Your submission has been received');*/
    
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpeg,gif,svg,avif'
        ]);

        $data= new Notice();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->user_id=$Id;
        //$data->user_id=Auth::user();
        //$data->user_id=$_SESSION['id'];
       
       /*$personalAccessToken = PersonalAccessToken::findToken($plainTextToken);
        $data->user_id= $personalAccessToken->tokenable;*/

        


        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('message', 'Thank you!   Your submission has been received');
        
    }

    public function delete($notice)
    {
        Notice::find($notice)->delete();
        //return redirect('/editDelete');
        return redirect()->back()->with('message', 'Thank you!   The Notice has been deleted');
        
    }

    public function edit($notices)
    {
          $book=Notice::find($notices);
          return view('editNotices',compact('book'));
        
    }
   
    public function update(Request $request, $notice)
    {
      
        $book=Notice::find($notice);
        /*$request->validate
        ([
            'category_id'=>'required|not_in:None'
        ]);*/
        $book->title=$request->input('title');
        $book->description=$request->input('description');
        $book->image=$request->input('image');
       
        /*if($request->hasfile('image')==null)
        {

            return redirect()->back()->with('message', 'Please upload file');
        }*/

        if($request->hasfile('image'))
        {
           

            $image= $request->file('image');
            $filename= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('public/Image'), $filename);
            $book['image']= $filename;

        }
        
        $book->update();


        return  redirect('/viewNotices')->with('message', 'Thank you!   Your submission has been received'); 
    }

    public function connectDashboard()
    {
        $user= new User();

        $user->firstName=Session::get('firstName');
        $user->lastName=Session::get('lastName');
        $user->mobileNumber=Session::get('mobileNumber');
        $user->address=Session::get('address') ;
        $user->email=Session::get('email');
        $user->usertype=Session::get('usertype');
        $user->id=Session::get('id');

        return view('home_page/admin_home_uploading',compact('user'));

    }

    public function connectStudentDashboard()
    {
        $user= new User();
        
        $user->firstName=Session::get('firstName');
        $user->lastName=Session::get('lastName');
        $user->mobileNumber=Session::get('mobileNumber');
        $user->address=Session::get('address') ;
        $user->email=Session::get('email');
        $user->usertype=Session::get('usertype');
        $user->id=Session::get('id');

        return view('home_page/student_home_uploading',compact('user'));

    }

}
