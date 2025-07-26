<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ✅ 루트 접근 시 로그인 여부에 따라 리디렉션
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// ✅ /dashboard → 역할에 따라 분기
Route::middleware(['auth'])->get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('dashboard.admin'),
        'creditor' => redirect()->route('dashboard.creditor'),
        'debtor' => redirect()->route('dashboard.debtor'),
        default => abort(403),
    };
})->name('dashboard');

// ✅ 역할별 대시보드
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', function () {
        return auth()->user()->role === 'admin'
            ? view('dashboard.admin.index')
            : redirect()->route('dashboard');
    })->name('dashboard.admin');

    Route::get('/dashboard/creditor', function () {
        return auth()->user()->role === 'creditor'
            ? view('dashboard.creditor.index')
            : redirect()->route('dashboard');
    })->name('dashboard.creditor');

    Route::get('/dashboard/debtor', function () {
        return auth()->user()->role === 'debtor'
            ? view('dashboard.debtor.index')
            : redirect()->route('dashboard');
    })->name('dashboard.debtor');
});

// ✅ 프로필 관련은 그대로 유지
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ 인증 라우트 포함
require __DIR__.'/auth.php';
