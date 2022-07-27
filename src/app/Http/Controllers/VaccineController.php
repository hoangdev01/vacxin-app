<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Http\Requests\StoreVaccineRequest;
use App\Http\Requests\UpdateVaccineRequest;

use Illuminate\Support\Facades\Storage;

class VaccineController extends Controller
{
	public function allVaccine() {
		$vaccines = Vaccine::paginate(10);
		return view('admin.vaccine.vaccine', ['vaccines' => $vaccines]);
	}

	public function create() {
		return view('admin.vaccine.add');
	}

	public function store(StoreVaccineRequest $request) {
		$data = $request->all();
		$vaccine = Vaccine::create($data);
		return response()->json([
			'error'=>false
		]);
	}

	public function uploadImg(Request $request) 
	{
		// $imageName = time().'.'.$request->file->extension();  
		// $path = Storage::disk('s3')->put('file', $request->file);
		// $path = Storage::disk('s3')->url($path);
		// return json_encode($path);
		// $vaccine = Vaccine::find($request->vaccine_id);
		// $vaccine->image = $path;
		// $vaccine->save();
		// return json_encode($request->file);
		$imageName = time().'-'.$request->file->getClientOriginalName();
		$request->file->move(public_path('storage'), $imageName);
		$vaccine = Vaccine::find($request->vaccine_id);
		$vaccine->image =$imageName;
		$vaccine->save();
		return json_encode($request->file);
	}

	public function edit($id){
		$vaccine = Vaccine::find($id);
		if ($vaccine == null){
			return abort(404);
		}
		else {
			return view('admin.vaccine.edit', ['vaccine' => $vaccine]);
		}	
	}

	public function update(UpdateVaccineRequest $request, $id) {
		$data = $request->all();
		$vaccine = Vaccine::find($id)->update($data);
		return response()->json([
			'error' => false
		]);
	}

	public function getVaccine() {
		$vaccines = Vaccine::where('active', '=', 1)->paginate(10);
		return view('pages.vaccine', ['vaccines' => $vaccines]);
	}
	public function delete($id){
    	$vaccine = Vaccine::find($id)->delete();
    	return response()->json([
    		'message' => 'Xoa thanh cong'
    	]);
	}
}
