<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $articlesCount = 0;
        $usersCount = 0;
        $commentsCount = 0;
        $recentArticles = [];

        if (empty($search)) {
            $articles = Article::with('user')->get();
            $articlesCount = Article::count();
            $usersCount = User::count();
            $commentsCount = Comment::count(); // Update this line with the actual count of comments if you have a Comment model
            $recentArticles = Article::orderBy('created_at', 'desc')->take(6)->get();
        } else {
            $articles = Article::where('judul', 'like', '%' . $search . '%')->get();
        }

        return view('dashboard', [
            'articles' => $articles,
            'articlesCount' => $articlesCount,
            'usersCount' => $usersCount,
            'commentsCount' => $commentsCount,
            'recentArticles' => $recentArticles,
        ]);
    }
}
