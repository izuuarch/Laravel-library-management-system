<?php

namespace App\Http\Controllers\AdminController;

use App\Models\book;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\requestedbook;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\returnedbook;

class Admindashboardcontroller extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function users(){
        $user = User::where('role_as',"0")->get();
        return view('admin.users',['users'=>$user]);
    }
    public function viewusers($id){
        $user = User::find($id);
        return view('admin.user',['user'=>$user]);
    }
    public function createbooks(){
        return view('admin.createbooks');
    }
    public function createbook(Request $req){
        $this->validate($req, [
            'booktitle' => 'required',
            'bookdetails' => 'required',
            'bookimage' => 'image|nullable|max:2999|required'
        ]);
        $savebook= new book;
        $bookid = Str::random(10);
        $savebook->bookname = $req->input('booktitle');
        $savebook->bookdetails = $req->input('bookdetails');
        $savebook->bookid = $bookid;
        if($req->hasFile('bookimage')){
            $fileext = $req->file('bookimage')->getClientOriginalName();
            $filename = pathinfo($fileext, PATHINFO_FILENAME);
            $extension = $req->file('bookimage')->getClientOriginalExtension();
            $storefile = $filename.'_'.time().'.'.$extension;
            $path = $req->file('bookimage')->move('./uploads', $storefile); 
            $savebook->bookimage = $storefile;
        }
        $savebook->save();
        return redirect(route('createbooks'))->with('success',"Book Created successfully for collection");
    }
    public function books(){
        $books= new book;
        $fetched = $books::all();
        return view('admin.books',['fetched'=>$fetched]);
    }
    public function requestedbooks(){
        $requestedbooks =  DB::table('requestedbooks')
         ->join('books','books.bookid','=','requestedbooks.bookid')
         ->get();
        return view('admin.requestedbooks',['requestedbooks'=>$requestedbooks]);
//         ->select('users.id','users.name','profiles.photo');
    }
    public function viewrequests($id){
         $usersrequests = DB::table('requestedbooks')
         ->join('users','users.id','=','requestedbooks.requestby')
         ->where(['bookid' => $id])
         ->get();
         return view('admin.usersrequests',['usersrequests'=>$usersrequests]);
    }
    public function returnedbooks(){
        $returnedbooks =  DB::table('returnedbooks')
         ->join('books','books.bookid','=','returnedbooks.bookid')
         ->get();
        return view('admin.returnedbooks',['returnedbooks'=>$returnedbooks]);
    }
    public function returnbook(Request $req){
    $userby = $req->userid;
    $bookid = $req->bookid;
    $returnedbooks = new returnedbook;
    $returnedbooks->returnedby = $userby;
    $returnedbooks->bookid = $bookid;
    $returnedbooks->save();
    return redirect(route('requestedbooks'))->with('success',"Book returned successfully");
    }
    public function viewbook($id){
        $book = book::where('bookid',$id)->first();
        return view('admin.viewbook',['fetch'=>$book]);
    }
}
