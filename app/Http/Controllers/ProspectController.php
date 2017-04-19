<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prospect;

class ProspectController extends Controller
{
    //

    public function __contruct()
    {
        $this->middleware('auth')->except( [
            'index',
            'show'
        ]);
    }

    public function index()
    {
        $prospects = Prospect::latest()-> all();

        return view('prospect.index', compact('prospects'));
    }
    
    public function show(Prospect $prospect)
    {
        return view('prospect.show', compact('prospect'));
    }

    public function create()
    {
        return view('prospect.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'street_address' => 'required|string',
            'street_address2' => 'string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|min:5|max:5|integer',
            'country' => 'required|string',
            'sex' => 'required|string',
            'phone' => 'required|phone',
            'birthday' => 'required|date',
            'email' => 'email',
            'secondary_school' => 'required|string',
            'start_semester' => 'required|string',
            'start_year' => 'required|integer|min:2017|max:3000',
            'college_credit' => 'required|numeric',
            'college_name' => 'string',
            'primary_major' => 'required|string',
            'secondary_major' => 'string',
            'other_interests' => 'string',
            'hear_about_us' => 'required|string',
            'other_hear' => 'string',
            'contact' => 'required|string'
        ] );



        auth()->user()->publish(
            new Prospect( request( [
                'first_name',
                'last_name',
                'street_address',
                'street_address2',
                'city',
                'state',
                'zipcode',
                'country',
                'sex',
                'phone',
                'birthday',
                'email',
                'secondary_school',
                'start_semester',
                'start_year',
                'college_credit',
                'college_name',
                'primary_major',
                'secondary_major',
                'other_interests',
                'hear_about_us',
                'other_hear',
                'contact'
            ] ) )

        );

        return redirect('prospect.index');
    }


}
