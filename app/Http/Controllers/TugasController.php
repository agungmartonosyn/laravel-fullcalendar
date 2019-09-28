<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use \Carbon\Carbon;

class TugasController extends Controller
{
	public function index()
	{
		$dataTugas = Tugas::all();
		$now = \Carbon\Carbon::now();

	    return view('tugas.index', compact('dataTugas', 'now'));
	}

	public function create()
	{
	    return view('tugas.create');
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
	        'name' => 'required',
	        'description' => 'required',
	        'task_date' => 'required|date|after:today'
	    ]);

		$newTugas = new Tugas();
		$newTugas->name = $request->name;
		$newTugas->description = $request->description;
		$newTugas->task_date =  date('Y-m-d', strtotime($request->task_date));
		$newTugas->save();

	    return redirect()->route('tugas.index');
	}

}
