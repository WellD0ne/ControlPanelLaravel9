<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $dateWriteoff = $user->dateact;
        $dateWriteoff = Carbon::createFromDate($dateWriteoff);
        $dateCurrent = Carbon::today();
        $userBalance = $user->ostatok;
        $subscriptionFee = $user->abonplata;
        $alertBalance = false;
        $alertBalanceForHumans = '';

        // Уведомление о пополнении баланса менее 4 дней
        if ($dateCurrent->diffInDays($dateWriteoff, false) <= 3 && $dateCurrent->diffInDays($dateWriteoff, false) > 0) {
            if ($userBalance - $subscriptionFee < 0) {
                $alertBalance = true;
                $alertBalanceForHumans = $dateWriteoff->longAbsoluteDiffForHumans($dateCurrent);
            }
        }

        // Берем самое свежее уведомление
        $firstNotification = $user->unreadNotifications->first();

        // Получаем финансовые операции
        $financeOperations = $user->financeOperations()->with('financeType')->orderBy('op_date', 'desc')->get();

        // Получаем товары для витрины
//        $products = MarketProduct::where('is_active', true)->orderBy('id')->get();

        return view('home', compact("user", "firstNotification", "financeOperations", "alertBalance", "alertBalanceForHumans"));
    }
}
