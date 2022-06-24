<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use library;

use Illuminate\Support\Facades\File;//file model used for update mehthod
use Illuminate\Support\Facades\Stroage;//beacuse of we want to download files from our storage

use App\Models\Books;//use Books model because import it
use App\Models\Category;

class BooksController extends Controller
{       
    public function index()
    {
        // $books=Books::all();//get all element in Books model
        $books=Books::with('category')->get();
        return view('viewBooks',compact('books'));//target destination is viewBooks view
    }

    public function download(Request $request,$file)
    {
        //return Storage::download($file);
        return response()->download(public_path('pdfs/'.$file));
    }

    public function add()
    {
        $categories=Category::all();
        return view('addBooks',compact('categories'));

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
          $categories=Category::all();
          return view('editBooks',compact('book','categories'));
        
    }
   
    public function update(Request $request, $book)
    {
       
        $book=Books::find($book);

        $book->name=$request->input('name');
        $book->category=$request->input('category');
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


        return  redirect('/editDelete'); 
    }

    public function search()
    {
          $search_text=$_GET['query'];
          $books=Books::where('name','LIKE','%'.$search_text.'%')->orWhere('author','LIKE','%'.$search_text.'%')->orWhere('category','LIKE','%'.$search_text.'%')->orWhere('publisher','LIKE','%'.$search_text.'%')->get();
          return view('search',compact('books'));    
    }

    public function studentSerach()
    {
          $s_text=$_GET['query'];
          $books=Books::where('name','LIKE','%'.$s_text.'%')->orWhere('author','LIKE','%'.$s_text.'%')->orWhere('category','LIKE','%'.$s_text.'%')->orWhere('publisher','LIKE','%'.$s_text.'%')->get();
          return view('studentSerach',compact('books'));    
    }
   
    public function studentPdf($id)
    {
        $data=Books::find($id);
        return view('StudentViewPdfs',compact('data'));
       
    }

    public function studentView()
    {
        $books=Books::all();//get all element in Books model
        return view('studentView',compact('books'));//target destination is viewBooks view
    }
    public function editDeleteBookCategory()
    {
        $category=Category::all();//get all element in Books model
        return view('editDeleteBookCategory',compact('category'));
    }
    public function editBookCategory($id)
    {
          $category=Category::find($id);
          
          return view('editBookCategory',compact('category'));
        
    }

    public function deleteCategory($category)
    {
        Category::find($category)->delete();
        //return redirect('/editDelete');
        return redirect()->back()->with('message', 'Thank you!   The book has been deleted');
        
    }

    public function updateBooksCategory(Request $request, $id)
    {
       
        $category=Category::find($id);

        $category->name=$request->input('name');
        $category->description=$request->input('description');

        $category->update();
        return  redirect('/editDeleteBookCategory'); 
    }
    public function viewBookCategory()
    {
        // $books=Books::all();//get all element in Books model
        $category=Category::all();
        return view('viewBookCategory',compact('category'));//target destination is viewBooks view
    }



    public function addBooksCategory()
    {
        return view('addBooksCategory');

    }

    public function storeBookCategory(Request $request)
    {
        /*$input=$request-> all();
        Books::create($input);
        return  redirect('/');*/

        $request->validate([
            'name'=>'required',
            'description'=>'required',

        ]);
        $input=$request-> all();
        Category::create($input);

        return redirect('/addBooksCategory')->with('message', 'New category  has been added');
        
    }
}

