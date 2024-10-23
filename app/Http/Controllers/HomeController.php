<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Payment;
use App\Models\Area;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $scheduleCount = Schedule::count();
        $areaCount = Area::count();
        $duePaymentsCount = Payment::where('status', 'pending')->count();
    	return view('admin.index',compact('userCount','scheduleCount','areaCount','duePaymentsCount'));
    }

    public function home(){
    	return view('waste.index');
    }

    public function dashboard()
    {
        
         // Get the logged-in user
        $user = Auth::user();

        // Check if the user is authenticated
         if ($user) {
            // Get the user's area_id
            $areaId = $user->area_id;
            
            // Get the user's ID
            $userId = $user->id;

            // Count the schedules for the user's area
            $scheduleCount = Schedule::where('area_id', $areaId)
                                    ->count();

                                    // Count the due payments for the logged-in user
            $duePaymentsCount = Payment::where('status', 'pending')
            ->where('user_id', $userId)
            ->count();

            return view('dashboard.index',compact('scheduleCount','duePaymentsCount'));
        }
        else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to view dashboard info.');
        }
    	
    }

    public function about(){
    	return view('waste.about');
    }

    public function support(){
    	return view('waste.support');
    }
}
