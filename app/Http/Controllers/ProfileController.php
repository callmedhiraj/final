<?php

namespace App\Http\Controllers;

use App\Booking;
use App\SeatBooking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user=Auth::user();
       return view('profiles.index',compact('user'));
    }

    public function viewBookingDetails($id)
    {
        $bookings = SeatBooking::where('booking_id', $id)->get();
        $booking_details = Booking::join('schedules', 'bookings.schedule_id', '=', 'schedules.id')
            ->join('tours', 'schedules.tour_id', '=', 'tours.id')
            ->where('bookings.id', $id)
            ->select('bookings.id as booking_id', 'bookings.amount', 'bookings.booking_code', 'schedules.tour_date', 'tours.name as tour_name','bookings.created_at')
            ->first();
        return view('profiles.booking_details', compact('bookings','booking_details'));
    }

    public function changePassword()
    {
        return view('profiles.change_password');
    }

    public function storePassword(Request $request)
    {
        $user=Auth::user();
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            Flash::error('Old Password doesnot match.');
            return redirect()->back();
        }
        $new_password=Hash::make($request->password);
        User::where('id',$user->id)->update(['password'=>$new_password]);
        Flash::success("Password Updated Successfully");
        return redirect()->back();
    }

    public function mybookings(){

        $bookings = Booking::join('schedules', 'bookings.schedule_id', '=', 'schedules.id')
            ->join('tours', 'schedules.tour_id', '=', 'tours.id')
            ->join('tour_translations', 'tour_translations.tour_id', 'tours.id')
            ->where('customer_id', Auth::user()->id)
            ->select('bookings.id as booking_id', 'bookings.amount', 'bookings.booking_code', 'schedules.tour_date', 'tour_translations.name as tour_name')
            ->get();
        return view('profiles.bookings', compact('bookings'));
    }

    public function edit($id){

        $user=User::find($id);
        return view('profiles.edit',compact('user'));
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('profile.index')
            ->with('success', 'Data updated successfully');

    }
}
