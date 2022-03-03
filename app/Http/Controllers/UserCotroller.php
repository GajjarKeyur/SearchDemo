<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Redis;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class UserCotroller extends Controller
{
    //
    public function index(Request $request)
    {
        $path = $request->path();
        $url = $request->url();
        $pattern = $request->is('api/*');

        return response()->json([
            'path' => $path,
            'url' => $url,
            'pattern'=>$pattern,
        ]);
    }
    public function add(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            "message" => "Data added successfully..!",
            "status" => 200
        ]);
    }



    public function search(Request $request)
    {
        //$search = $request['search'] ?? "";
        // dd($search);
        // if($search){
        //     $user = User::where('name','Like','%'.$search.'%')
        //     ->WhereHas('book',function($query)use($search){
        //         return $query->where('book_author','Like','%'.$search.'%');
        //     })->get();
        // }
        // else{
        //     $user = User::all();
        // }

        $query = $request["search"] ?? "";

        if ($query) {
            $user = User::with(['book'])->where('name', 'Like', '%' . $query . '%')->get();
            $book = Book::with(['user'])->where('book_name', 'Like', '%' . $query . '%')->get();
            $search = ($user->merge($book));
        } else {
            $user = User::with(['book'])->get();
        }

        return response()->json([
            'search'=> $search,
        ]);
    }
}
