<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use library;

use Illuminate\Support\Facades\File;//file model used for update mehthod
use Illuminate\Support\Facades\Stroage;//beacuse of we want to download files from our storage

use App\Models\Books;//use Books model because import it


class BooksController extends Controller
{       
    public function index()
    {
        $books=Books::all();//get all element in Books model
        return view('viewBooks',compact('books'));//target destination is viewBooks view
    }

    public function download(Request $request,$file)
    {
        //return Storage::download($file);
        return response()->download(public_path('pdfs/'.$file));
    }

    public function add()
    {
        return view('addBooks');

    }
    public function store(Request $request)
    {
        /*$input=$request-> all();
        Books::create($input);
        return  redirect('/');*/

        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'file'=>'required',
            'category'=>'required'
        ]);


        $data=new Books();
        $file=$request->file;
       
        $filename=time().'.'.$file->getClientOriginalExtension();
        $filename=time().'.'.$file->getClientOriginalName();

        $request->file->move('pdfs',$filename);

       

        $data->file=$filename;
        $data->name=$request->name;
        $data->category=$request->category;
        $data->author=$request->author;
        $data->publisher=$request->publisher;
        $data->save();
        //return  redirect('/');
        return redirect()->back()->with('message', 'Thank you!   Your submission has been received');
        
    }
    /*public function choose()
    {
        return view('chooseBooks');

    }
    public function storechooseBook(Request $request)
    {
        $input=$request-> all();
        Books::create($input);
        return  redirect('/');
    }*/
    public function showPdf($id)
    {
        $data=Books::find($id);
        return view('viewPdfs',compact('data'));
       
    }
    
    public function editDelete()
    {
        $books=Books::all();//get all element in Books model
        return view('editDelete',compact('books'));
    }
    

    public function delete($book)
    {
        Books::find($book)->delete();
        //return redirect('/editDelete');
        return redirect()->back()->with('message', 'Thank you!   The book has been deleted');
        
    }
   
    public function edit($book)
    {
          $book=Books::find($book);
          
          return view('editBooks',compact('book'));
        
    }
   
    public function update(Request $request, $book)
    {
       
        /*$book->name=$input['name'];
        $book->publisher=$input['publisher'];
        $book->author=$input['author'];
        $book->file=$input['file'];*/
       
        //$input=$request-> all();
        $book=Books::find($book);

        $book->name=$request->input('name');
        $book->author=$request->input('author');
        $book->publisher=$request->input('publisher');
        $book->file=$request->input('file');
       
        if ($request->hasfile('file')==null)
        {
            //session()->flash('message','Please upload file');
            return redirect()->back()->with('message', 'Please upload file');
        }

        if($request->hasfile('file'))
        {
           
            $file=$request->file('file');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('pdfs/',$filename);
            $book->file=$filename;

        }
        
        
        $book->update();
        //session()->flash('message',$input['name'].'   Successfully Updated');

        return  redirect('/editDelete'); 
    }

    public function search()
    {
          $search_text=$_GET['query'];
          $books=Books::where('name','LIKE','%'.$search_text.'%')->orWhere('author','LIKE','%'.$search_text.'%')->orWhere('category','LIKE','%'.$search_text.'%')->orWhere('publisher','LIKE','%'.$search_text.'%')->get();
          return view('search',compact('books'));    
    }
   


}

