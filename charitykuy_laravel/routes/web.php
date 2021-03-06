<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

// Route::get('/', [MenuController::class, 'read_menus'])->name('menus.index')->middleware(['auth']);
Route::get('/redirect', function () {
    // if (!Auth()->check()) {
    //     return redirect()->route('login');
    // }

    if (in_array(Auth()->user()->roles, ['admin_role', 'stakeholder'])) {
        return redirect('dashboard');
    }

    return redirect('/'); // change to the regular user home page
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.main');
Route::get('dashboard/donations', [MenuController::class, 'read_menus'])->name('dashboard.donations');
Route::get('dashboard/transactions', [TransactionController::class, 'read_transc'])->name('dashboard.transactions');
Route::get('dashboard/users', [UserController::class, 'read_users'])->name('dashboard.users');
Route::patch('dashboard/transactions/{id}/edit', [TransactionController::class, 'confirm_transc'])->name('dashboard.confirm');

Route::get('/', [MenuController::class, 'read_menus'])->name('menus.index');
Route::get('{id}/transaksi', [TransactionController::class, 'read_transc'])->name('menus.transaksi');
Route::get('{item:id}/detail', [MenuController::class, 'menu_detail'])->name('menus.detail');

Route::get('create', [MenuController::class, 'add_menu'])->name('menus.add');
Route::post('create', [MenuController::class, 'store_menu'])->name('menus.store');
Route::get('{item:id}/edit', [MenuController::class, 'edit_menu'])->name('menus.edit');
Route::patch('{id}/edit', [MenuController::class, 'update_menu'])->name('menus.update');
Route::delete('{item:id}/delete', [MenuController::class, 'delete_menu'])->name('menus.delete');

Route::post('{id}/bayar', [TransactionController::class, 'bayar_donasi'])->name('trans.pay');

Route::get('profile', function () {
    return view('layouts/profile');
})->name('profile');
Route::get('{item:id}/detail/hitung_zakat', function (Menu $item) {
    return view('secondary/hitung_zakat',['item' => $item]);
})->name('zakat.hitung');
