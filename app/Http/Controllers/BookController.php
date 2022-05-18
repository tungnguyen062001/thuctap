<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function getAll_book(request $request){
        // $book = BookModel::getAll_book();
        // return view('book/list',['book' => $book]);
        $book= BookModel::paginate(3);
        $keyword = $request->input('keyword','');
        if(empty($keyword)){
            $book;
        }
        else{
            $book= BookModel::where('name','LIKE','%'.$keyword.'%')
            ->paginate(3);
        }
        return view('book/list',['book'=>$book]);
    }
    function hienthi_book($id){
        $book = BookModel::hienthi_book($id)[0];
        return view('book/sua',['book'=>$book]);
    }
    function them_book(request $request){
        $name = $request->input('name');
        $author = $request->input('author');
        $amount = $request->input('amount');
        $rs = BookModel::them_book($name,$author,$amount);
        if($rs == true){
            return Redirect('book/list');
        }
        else{
            return "thất bại";
        }
    }
    function sua_book(request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $author = $request->input('author');
        $amount = $request->input('amount');
        $rs = BookModel::sua_book($id,$name,$author,$amount);
        if($rs == true){
            return Redirect('book/list');
        }
        else{
            return "thất bại";
        }
    }
    function get_data(){
        return view('book/them',['CaHoc'=>BookModel::get_data()]);
    }
    function xoa_book($id_ca_hoc){
        $rs = BookModel::xoa_book($id_ca_hoc);
        if($rs!= 0 ){
            return Redirect('book/list');
        }
        else{
             return "khống có giá trị nào dc xóa";
        }
    }
}
