<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BakerApplication;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        // Получаем все заявки со статусом pending
        $applications = BakerApplication::where('status', 'pending')
            ->with('user') // Подгружаем данные пользователя
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function approve(BakerApplication $application)
    {
        // 1. Меняем статус заявки
        $application->update(['status' => 'approved']);
        
        // 2. Меняем роль пользователя
        $user = $application->user;
        $user->update(['role' => 'baker']);

        return redirect()->route('admin.applications')->with('success', 'Пользователь стал кондитером!');
    }

    public function reject(Request $request, BakerApplication $application)
    {
        $application->update([
            'status' => 'rejected',
            'admin_comment' => $request->input('admin_comment')
        ]);

        return redirect()->route('admin.applications')->with('success', 'Заявка отклонена.');
    }
}