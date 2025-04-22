<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Player;
use Carbon\Carbon;

class PlayerController extends Controller
{
    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'period' => 'required|in:15,30',
        ]);

        $startDate = Carbon::now();
        $days = (int)$request->period;
        $endDate = $startDate->copy()->addDays($days);

        Player::create([
            'name' => $request->name,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'days_count' => $days,
        ]);

        return back()->with('success', 'تم تسجيل اللاعب بنجاح');
    }
    public function index()
{   
    $players = Player::all();
    return view('players.index', compact('players'));
}
public function markDay($id)
{
    $player = Player::findOrFail($id);

    // تحقق إذا كان عندو أيام متبقية
    if ($player->days_used < $player->days_count) {
        // نقص يوم من الأيام المتبقية
        $player->days_used += 1;
        $player->save();

        return redirect()->back()->with('success', 'تم تسجيل الحضور لهذا اليوم');
    }

    return redirect()->back()->with('error', 'انتهت الأيام المتبقية');
}

// public function renew(Request $request, $id)
// {
//     $player = Player::findOrFail($id);

//     $request->validate([
//         'new_days_count' => 'required|integer|min:1',
//     ]);

//     $player->start_date = now();
//     $player->end_date = now()->addDays($request->new_days_count);
//     $player->days_count = $request->new_days_count;
//     $player->days_used = 0;
//     $player->save();

//     return redirect()->back()->with('success', 'تم تجديد الاشتراك بنجاح.');
// }
public function renew(Request $request, $id)
{
    $player = Player::findOrFail($id);
    $daysToAdd = $request->input('period');

    $player->days_count += $daysToAdd;
    $player->days_used = 0; // أو خليه متراكم حسب المطلوب
    $player->start_date = now();
    $player->end_date = now()->addDays($player->days_count);
    $player->save();

    return redirect()->route('players.index')->with('success', 'تم تجديد الاشتراك بنجاح');
}







}
