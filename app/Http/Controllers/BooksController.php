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
        //$books=Books::with('category')->get();//that's one with category
        $books=Books::paginate(2);
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
            'file'=>'required|mimes:pdf,doc',
            'category_id'=>'required'
        ]);


        $data=new Books();
        $file=$request->file;
       
        $filename=time().'.'.$file->getClientOriginalExtension();
        $filename=time().'.'.$file->getClientOriginalName();

        $request->file->move('pdfs',$filename);

       

        $data->file=$filename;
        $data->name=$request->name;
        $data->category_id=$request->category_id;
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
        $books=Books::paginate(2);//get all element in Books model
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
        $request->validate([
            'category_id'=>'required|not_in:None'
        ]);
        //must select category
        $book->name=$request->input('name');
        $book->category_id=$request->input('category_id');
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


        return  redirect('/editDelete')->with('message', 'Thank you!   Your submission has been received'); 
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
        return redirect()->back()->with('message', 'Thank you!   The category has been deleted');
        
    }

    public function updateBooksCategory(Request $request, $id)
    {
       
        $category=Category::find($id);

        $category->name=$request->input('name');
        $category->description=$request->input('description');

        $category->update();
        return  redirect('/editDeleteBookCategory')->with('message', 'Thank you!   The category has been updated');; 
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
            'name'=>'required|unique:categories',
            'description'=>'required',

        ]);
        $input=$request-> all();
        Category::create($input);
        return redirect('/addBooksCategory')->with('message', 'New category  has been added');
        
    }



    public function filter(Request $request)
    {
        $books = Books::query();

        $name = $request->name;
        $author = $request->author;
        $publisher = $request->publisher;
        $category = $request->category;

        if ($name) {
            $books->where('name','LIKE','%'.$name.'%');
        }
        if ($author) {
            $books->where('author','LIKE','%'.$author.'%');
        }

        if ($publisher ) {
            $books->where('publisher','LIKE','%'.$publisher .'%');
        }

        if ($category ) {
            $books->where('category','LIKE','%'.$category.'%');
        }

        $data = [
            'name' => $name,
            'category' => $category,
            'author' => $author,
            'publisher' => $publisher,
            'books' => $books->latest()->simplePaginate(3),
        ];

        return view('bookSerach',$data);
    }

    public function searchCategory()
    {
          $search_text=$_GET['query'];
          $books=Category::where('name','LIKE','%'.$search_text.'%')->get();
          return view('searchCategory',compact('books'));    
    }

    public function editBookSerach(Request $request)
    {
        $books = Books::query();

        $name = $request->name;
        $author = $request->author;
        $publisher = $request->publisher;
        $category= $request->category;

        if ($name) {
            $books->where('name','LIKE','%'.$name.'%');
        }
        if ($author) {
            $books->where('author','LIKE','%'.$author.'%');
        }

        if ($publisher ) {
            $books->where('publisher','LIKE','%'.$publisher .'%');
        }

        if ($category) {
            $books->where('category','LIKE','%'.$category.'%');
        }

        $data = [
            'name' => $name,
            'category' => $category,
            'author' => $author,
            'publisher' => $publisher,
            'books' => $books->latest()->simplePaginate(20),
        ];

        return view('editBookSerach',$data);
    }

    public function editSearchCategory()
    {
          $search_text=$_GET['query'];
          $books=Category::where('name','LIKE','%'.$search_text.'%')->get();
          return view('editSerachCategory',compact('books'));    
    }
    public function  studentSearch(Request $request)
    {
        $books = Books::query();

        $name = $request->name;
        $author = $request->author;
        $publisher = $request->publisher;
        $category = $request->category;

        if ($name) {
            $books->where('name','LIKE','%'.$name.'%');
        }
        if ($author) {
            $books->where('author','LIKE','%'.$author.'%');
        }

        if ($publisher ) {
            $books->where('publisher','LIKE','%'.$publisher .'%');
        }

        if ($category ) {
            $books->where('category','LIKE','%'.$category .'%');
        }

        $data = [
            'name' => $name,
            'category' => $category,
            'author' => $author,
            'publisher' => $publisher,
            'books' => $books->latest()->simplePaginate(20),
        ];

        return view('studentSerach',$data);
    }
}

