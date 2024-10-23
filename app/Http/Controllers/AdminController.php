<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Models\Role;
use App\Models\Payment;
use App\Models\Area;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Feedback;


class AdminController extends Controller
{
	//role functions
	public function view_role(){

		$roles = Role::all();
		return view('admin.role.view_role',compact('roles'));
	}

	public function add_role(Request $request){

		$role = new Role;
    	$role->name = $request->name;
    	$role->save();
    	
    	toastr()->timeOut(10000)->closeButton()->addSuccess('Role added successfully.');
    	
    	return redirect()->back();

	}

	public function edit_role($id)
	{
		$role = Role::find($id);
    	return view('admin.role.edit_role',compact('role'));

	}

	public function update_role(Request $request, $id)
	{
		$role = Role::find($id);
    	$role->name = $request->name;
    	$role->save();
    	toastr()->timeOut(10000)->closeButton()->addSuccess('Role Updated successfully.');
    	return redirect('/view_role');

	}

	public function delete_role($id)
	{
		$role = Role::find($id);
    	$role->delete();
    	toastr()->timeOut(10000)->closeButton()->addWarning('Role deleted successfully.');
    	return redirect()->back();
	}


//Area functions
	public function view_area()
	{
		$areas = Area::all();
		return view('admin.area.view_area',compact('areas'));
	}

	
	public function add_area(Request $request){

		 // Validate the request data
		 $validatedData = $request->validate([
			'local_unit' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'ward_no' => 'required|numeric|min:1',
		]);

		$area = new Area;
		$area->local_unit = $validatedData['local_unit'];
		$area->address = $validatedData['address'];
		$area->ward_no = $validatedData['ward_no'];
		$area->save();
    	
    	toastr()->timeOut(10000)->closeButton()->addSuccess('Area added successfully.');
    	
    	return redirect()->back();

	}

	public function edit_area($id)
	{
		$area = Area::findOrFail($id);
		return view('admin.area.edit_area', compact('area'));
	}

	public function update_area(Request $request, $id)
	{	
		// Validate the request data
		$validatedData = $request->validate([
			'local_unit' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'ward_no' => 'required|integer|min:1',
		]);
	
		// Find the Area instance by ID
		$area = Area::findOrFail($id);

		// Update the Area instance with validated data
		$area->local_unit = $validatedData['local_unit'];
		$area->ward_no = $validatedData['ward_no'];
		$area->address = $validatedData['address'];
		$area->save();

    	toastr()->timeOut(10000)->closeButton()->addSuccess('Area Updated successfully.');
    	return redirect('/view_area');
	}


	public function delete_area($id)
	{
		$area = Area::find($id);
    	$area->delete();
    	toastr()->timeOut(10000)->closeButton()->addWarning('Area deleted successfully.');
    	return redirect()->back();
	}


//Schedule Functions
	public function view_schedule(){
		$schedules = Schedule::all();
		$areas = Area::all();
		return view('admin.schedule.view_schedule',compact('schedules','areas'));
	}

	public function add_schedule(Request $request){
		// Validate the request data
		$validatedData = $request->validate([
			'collection_day' => 'required|string|max:255',
			'collection_time' => 'required|date_format:H', // Ensures only the hour is provided
			'area_id' => 'required|exists:areas,id',
		]);
	
		// Format collection_time to include minutes and seconds as 00:00
		$collectionTime = $validatedData['collection_time'] . ':00:00';


		 // Create a new Schedule instance and save the data
		 $schedule = new Schedule;
		 $schedule->collection_day = $validatedData['collection_day'];
		 $schedule->collection_time = $collectionTime;
		 $schedule->area_id = $validatedData['area_id'];
		 $schedule->save();

		toastr()->timeOut(10000)->closeButton()->addSuccess('Schedule added successfully.');
    	
    	return redirect()->back();

	}

	public function edit_schedule($id){
		$schedule = Schedule::findOrFail($id);
		$areas = Area::all();
		return view('admin.schedule.edit_schedule', compact('schedule','areas'));

	}

	public function update_schedule(Request $request, $id){
		// Validate the request data
		$validatedData = $request->validate([
			'collection_day' => 'required|string|max:255',
			'collection_time' => 'required|date_format:H', // Ensures only the hour is provided
			'area_id' => 'required|exists:areas,id',
		]);
	
		// Format collection_time to include minutes and seconds as 00:00
		$collectionTime = $validatedData['collection_time'] . ':00:00';

		$schedule = Schedule::find($id);

		$schedule->collection_day = $validatedData['collection_day'];
		$schedule->collection_time = $collectionTime;
		$schedule->area_id = $validatedData['area_id'];
		$schedule->save();
		toastr()->timeOut(10000)->closeButton()->addSuccess('Schedule Updated successfully.');
    	return redirect('/view_schedule');
		
	}


	public function delete_schedule($id)
	{
		$schedule = Schedule::find($id);
		$schedule->delete();
		toastr()->timeOut(10000)->closeButton()->addWarning('Schedule deleted successfully.');
		return redirect()->back();
		
	}

	public function schedule_search(Request $request)
	{
		$search = $request->search;

		$schedules = Schedule::where('collection_day','LIKE','%'.$search.'%')->get();
		$areas = Area::all();
		return view('admin.schedule.view_schedule',compact('schedules','areas'));

	}
	
	//payment functions
	public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index', compact('payments'));
    }

	public function create()
    {
        $users = User::all();
        return view('admin.payment.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'payment_period' => 'required|string',
            'status' => 'required|string|in:pending,completed,failed'
        ]);

		// Convert payment_amount to float
		$validateData['payment_amount'] = (float) $validateData['payment_amount'];

		$payment = new Payment();
		$payment->user_id = $validateData['user_id'];
		$payment->payment_method = $validateData['payment_method'];
		$payment->payment_amount = $validateData['payment_amount'];
		$payment->payment_period = $validateData['payment_period'];
		$payment->payment_date = $validateData['payment_date'];
		$payment->status = $validateData['status'];
		$payment->save();
		toastr()->timeOut(10000)->closeButton()->addSuccess('Payment added successfully.');
        return redirect()->route('payments.index');
    }

	public function edit_payment($id)
	{
		$payment = Payment::findOrFail($id);
		$users = User::all();
		return view('admin.payment.edit_payment', compact('payment','users'));

	}

	public function update_payment(Request $request, $id)
	{
		// Validate the request data
		$request->validate([
			'user_id' => 'required|exists:users,id',
			'payment_method' => 'required|in:esewa,khalti',
			'payment_date' => 'required|date',
			'payment_amount' => 'required|numeric',
			'payment_period' => 'required|string',
			'transaction_id' => 'required|string',
			'status' => 'required|in:pending,completed,failed',
		]);
	
		// Find the payment by ID
		$payment = Payment::find($id);
	
		// Update the payment details
		$payment->user_id = $request->user_id;
		$payment->payment_method = $request->payment_method;
		$payment->payment_date = $request->payment_date;
		$payment->payment_amount = $request->payment_amount;
		$payment->payment_period = $request->payment_period;
		$payment->transaction_id = $request->transaction_id;
		$payment->status = $request->status;
		
		// Save the changes
		$payment->save();
	
		// Add a success message and redirect to the payments view
		toastr()->timeOut(10000)->closeButton()->addSuccess('Payment updated successfully.');
		return redirect('/view_payments');
	}

	public function delete_payment($id)
	{
		$payment = Payment::find($id);
    	$payment->delete();
    	toastr()->timeOut(10000)->closeButton()->addWarning('Payment deleted successfully.');
    	return redirect()->back();
	}


	public function userPayments(User $user)
    {
        // Fetch payments for the specific user
        $payments = $user->payments;
        return view('admin.payment.user_payments', compact('user', 'payments'));
    }

	//User dashboard payments
	public function myPayments(User $user)
    {
        // Fetch payments for the specific user
        $payments = $user->payments;

        return view('dashboard.payment.user_payments', compact('user', 'payments'));
    }

	// User functions
	public function view_user()
    {
    	$users = User::paginate(5);
		$areas = Area::all();
		$roles = Role::all();
    	return view('admin.user.view_user',compact('users','areas','roles'));

    }

	public function add_user(Request $request){

		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
			'phone' => 'required|digits:10',
			'address' => 'required|string|max:255',
			'area_id' => 'required|exists:areas,id',
		]);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->role_id = 2; // Assuming 2 is the ID for "user"

		$user->area_id = $request->area_id;
		$user->save();

		toastr()->timeOut(10000)->closeButton()->addSuccess('User added successfully.');
    	
    	return redirect()->back();

	}

	public function edit_user($id){
		$user = User::findOrFail($id);
		$areas = Area::all();
		$roles = Role::all();
		return view('admin.user.edit_user', compact('user','areas','roles'));

	}

	public function update_user(Request $request, $id){

		// Fetch the user to update
		$user = User::findOrFail($id);

		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
			'phone' => 'required|digits:10',
			'address' => 'required|string|max:255',
			'role_id' => 'required|exists:roles,id',
			'area_id' => 'required|exists:areas,id',
		]);
		
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->role_id = $request->role_id;
		$user->area_id = $request->area_id;
		$user->save();
		toastr()->timeOut(10000)->closeButton()->addSuccess('User Updated successfully.');
    	return redirect('/view_user');
		
	}

	public function delete_user($id)
	{
		$user = User::find($id);
		$user->delete();
		toastr()->timeOut(10000)->closeButton()->addWarning('User deleted successfully.');
		return redirect()->back();
		
	}

	//Feedback Functions
	public function feedback()
	{
		$feedbacks = Feedback::all();
		return view('admin.feedback.feedback', compact('feedbacks'));
	} 
	public function createfeedaback()
    {
        return view('waste.support');
    }

	public function storefeedback(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'message' => 'required|string|max:1000',
        ]);

        // Create a new comment and save it to the database
        Feedback::create($validatedData);

        // Redirect back with a success message
		return redirect()->route('comments.create')->with('success', 'Thank you for your feedback!');
    }


	//userSchedule functions
	public function userSchedules()
    {
        $user = Auth::user();
        $schedules = Schedule::where('area_id', $user->area_id)->get();

        return view('dashboard.user.schedules', compact('schedules'));
    }

	//driverschedules functions
	public function driverSchedules()
    {
        $user = Auth::user();
        $schedules = Schedule::all();

        return view('dashboard.user.driverschedule', compact('schedules'));
    }

	public function edit_driverschedule($id){
		$schedule = Schedule::findOrFail($id);
		$areas = Area::all();
		return view('dashboard.user.edit_driverschedule', compact('schedule','areas'));

	}

	public function update_driverschedule(Request $request, $id){
		// Validate the request data

		$validatedData = $request->validate([
			'collection_day' => 'required|string|max:255',
			'collection_time' => 'required|date_format:H', // Ensures only the hour is provided
			'area_id' => 'required|exists:areas,id',
			'status' => 'required|in:pending,completed',
		]);
	
		// Format collection_time to include minutes and seconds as 00:00
		$collectionTime = $validatedData['collection_time'] . ':00:00';

		$schedule = Schedule::find($id);

		if (!$schedule) {
			return redirect('/driver/schedules')->with('error', 'Schedule not found.');
		}

		$schedule->collection_day = $validatedData['collection_day'];
		$schedule->collection_time = $collectionTime;
		$schedule->area_id = $validatedData['area_id'];
		$schedule->status = $validatedData['status'];
		
		 // Save the schedule
		 try {
			$schedule->save();
		} catch (\Exception $e) {
			\Log::error('Error saving schedule:', ['exception' => $e->getMessage()]);
			return redirect('/driver/schedules')->with('error', 'Error updating schedule.');
		}
		
		toastr()->timeOut(10000)->closeButton()->addSuccess('Schedule Updated successfully.');
    	return redirect('/driver/schedules');
		
	}


}
