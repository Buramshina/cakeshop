<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BakerApplication;
use Illuminate\Support\Facades\Auth;

class BakerApplicationController extends Controller
{
    // Показ формы
    public function create()
    {
        $user = Auth::user();
        // Проверяем, нет ли уже активной заявки
        $application = BakerApplication::where('user_id', $user->id)
                        ->latest()
                        ->first();

        return view('pages.apply-baker', compact('application'));
    }

    // Сохранение формы
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|min:30',
            'portfolio_url' => 'nullable|url',
        ]);

        BakerApplication::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'portfolio_url' => $request->portfolio_url,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Заявка отправлена! Ожидайте проверки.');
    }
}