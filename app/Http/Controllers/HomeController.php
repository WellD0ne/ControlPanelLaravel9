<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $dateWriteoff = Carbon::createFromDate($user->dateact);
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

        return view('home', compact("user", "firstNotification", "financeOperations", "alertBalance", "alertBalanceForHumans"));
    }
}
