<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Message;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Storage;


class LinkController extends Controller
{
    public function index() {
        $posts = Post::orderByDesc('created_at')->paginate(6);
        return view('index', compact('posts'));
    }
    public function news() {
        $posts = Post::orderByDesc('created_at')->paginate(20);
        return view('news', compact('posts'));
    }
    public function home() {
        $posts = Post::orderByDesc('created_at')->paginate(10);
        $messages = Message::orderByDesc('created_at')->paginate(10);
        return view('home', compact('posts', 'messages'));
    }
    public function form() {
        return view('form');
    }
    public function newPost() {
        return view('newPost');
    }
    public function storePost(PostRequest $request, Post $post) {
        $data = $request->validated();
        Post::create($data);
        return redirect()->back()->with('post', 'Пост опубликован');
    }
    public function storeMessage(MessageRequest $request) {
        $data = $request->validated();
        Message::create($data);
        return redirect()->route('form')->with('message', 'Ваше сообщение отправлено!');
    }
    public function showMessage(Message $id) {
        $message = Message::find($id);
        return view('showMessage', compact('message'));
    }
    public function deleteMessage(Message $message) {
        $message->delete();
        return redirect()->back()->with('delete', 'Сообщение удалено');
    }
    public function editPost(Post $id) {
        $posts = Post::find($id);
        foreach($posts as $post) {
            return view('editPost', compact('post'));
        }
    }
    public function pathPost(EditPostRequest $request, Post $id) {
        $data = $request->validated();
        $posts = Post::find($id);
        foreach($posts as $post) {
            $post->update($data);
        }
        return redirect()->back()->with('editPost', 'Изменения сохранены');
    }
    public function showNews(Post $id) {
        $post = Post::find($id);
        $posts = Post::orderByDesc('created_at')->paginate(20);
        $comments = $post[0]->comments()->orderByDesc('created_at')->paginate(10);
        return view('showNews', compact('post', 'posts', 'comments'));
    }
    public function deletePost(Post $post) {
        $post->delete();
        return redirect()->back()->with('deletePost', 'Пост удален');
    }
    public function storeComment(CommentRequest $request, Comment $comment, Post $id) {
        $data = $request->validated();
        $post = Post::find($id);
        if (auth()->check()) {
            $data['user_name'] = auth()->user()->name;
        } else {
            $data['user_name'] = $request['user_name'];
        }
        $data['post_id'] = $post[0]->id;
        Comment::create($data);
        return redirect()->back()->with('comment','Комментарий опубликован');
    }
}
