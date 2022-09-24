<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(){

        $post1 = Post::find(1); //find one by id
        $post2 = Post::all(); //find all
        $post3 = Post::where('is_published', 1)->get(); //find all with is_published=1  Always using with method "get" or "first"

        return($post3);
    }

    public function create(){
        $postsArr = [
            [
                'title' => 'title test create ',
                'content' => 'content test create',
                'image' => 'image test create',
                'likes' => 15,
                'is_published' => 1,
            ],
            [
                'title' => 'title test create 2',
                'content' => 'content test create 2',
                'image' => 'image test create 2',
                'likes' => 15,
                'is_published' => 1,
            ],
        ];

//        $newPost = Post::create([
//            'title' => 'title test create',
//            'content' => 'content test create',
//            'image' => 'image',
//            'likes' => 15,
//            'is_published' => 1,
//        ]);

        foreach ($postsArr as $item){
            Post::create($item);
        }


        return 'data base update';
    }

    public function update(){
        $updatePosst = Post::find(1);
        $updatePosst->update([
            'title' => 'update title',
            'content' => 'update content',
        ]);
    }

    public function delete(){
        //если стоит SoftDelete данные не удалаются а помечаются в колонке deleted_at и ларавель будет считать запись удаленной
        $deletePost = Post::find(6);
        $deletePost->delete();

        //востановление данных после мягкого удаления
        $post = Post::withoutTrashed()->find(6);
        $post->restore();
    }

    public function firstOrCreate(){
        $anotherPost = [
            'title' => 'another title',
            'content' => 'another content',
            'image' => 'another image',
            'likes' => 25,
            'is_published' => 1,
        ];
        //если находит в БД по условиям что указаны первым аргументом то просто возвращает эту запись
        //если не находит то создает новую запись указанную вторым
        $myPost = Post::firstOrCreate([
            'title' => 'title test create9',
        ], $anotherPost);
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'another title',
            'content' => 'another content',
            'image' => 'another image',
            'likes' => 25,
            'is_published' => 1,
        ];
        //если находит в БД по условиям что указаны первым аргументом то изменяет эту запись
        //если не находит то создает новую запись указанную вторым
        $myPost = Post::updateOrCreate([
            'title' => 'another title',
        ], $anotherPost);
    }
}
