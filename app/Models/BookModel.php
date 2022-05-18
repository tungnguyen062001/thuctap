<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookModel extends Model
{
    use HasFactory;
    // static function getAll_book(){
    //     $book = DB::select("SELECT * FROM books");
    //     return $book;
    // }
    protected $table = 'books';
    static function them_book($name,$author,$amount){
        return DB::insert("INSERT INTO `books` (`id`, `name`, `author`, `amount`, `created_at`, `updated_at`)
        VALUES (NULL, '$name', '$author', '$amount', NULL, NULL);");
    }
    static function hienthi_book($id){
        $book = DB::select("SELECT * FROM books WHERE id ='$id' ");
    return $book;
    }
    static function sua_book($id,$name,$author,$amount){
        return DB::update("UPDATE books
        SET name = '$name',author ='$author',
        amount = '$amount'
        WHERE id = '$id' ");
    }
    static function xoa_book($id){
        $rs = DB::delete("DELETE FROM books WHERE id = '$id'");
        return $rs;
    }static function get_data(){

    }
}
