<?php

namespace App\Http\Controllers\UserController;

use App\Models\book;
use Illuminate\Http\Request;
use App\Models\requestedbook;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Userdashboardcontroller extends Controller
{
    public function index(){
        return view('user.home');
    }
    public function checkbooks(){
        $books = new book;
        $fetched = $books::all();
        return view('user.checkbooks',['fetched'=>$fetched]);
    }
    public function requestbook(Request $req){
        $reqbook= new requestedbook;
        $reqbook->bookid = $req->bookid;
        $reqbook->requestby = Auth::user()->id;
        $reqbook->save();
        return redirect(route('checkbooks'))->with('success',"Book Requested successfully");

    }
    public function viewbook($id){
        $viewbook =  book::where('bookid',$id)->first();
        return view('user.viewbook',['viewbook'=>$viewbook]);
    }
    public function unrequestbook(Request $req){
        $reqbook= new requestedbook;
        $find = $reqbook::find($req->bookid);
        var_dump($find);
        // $find->delete();
        // return redirect(route('checkbooks'))->with('success',"You Un requested for the book");
    }
    public function returned(){
        $returnedbooks =  DB::table('returnedbooks')
        ->join('books','books.bookid','=','returnedbooks.bookid')
        ->where(['returnedby' => Auth::user()->id])
        ->get();
       return view('user.returned',['returnedbooks'=>$returnedbooks]);
    }
}
