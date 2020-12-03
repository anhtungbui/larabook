<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'query' => ['required']
        ]);

        $users = User::where('name', 'LIKE', "%${validatedData['query']}%")
                            ->get();
        // ddd(strtolower($validatedData['query']));
        // ddd($users);
        return view('search.index', [
            'users' => $users,
            'query' => $validatedData['query'],
        ]);
    }
}
