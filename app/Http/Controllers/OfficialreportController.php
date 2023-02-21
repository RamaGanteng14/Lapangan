<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Users;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\official_report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OfficialreportController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()?->id;
        // dd($user_id);
        $search = $request->search;
        $official = official_report::with('users')
        ->when($search, function($query) use ($search) {
            $query->whereHas('users', function($query) use($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhere('instansi', 'LIKE', '%'.$search.'%')
            ->orWhere('address', 'LIKE', '%'.$search.'%')
            ->orWhere('client', 'LIKE', '%'.$search.'%');
        })
        ->get();
        // $official  = official_report::where([
        //         ['user_id', $user_id]
        //     ])
        //     ->get();
        return view('lap.index',['official' => $official]);
        
    }
    public function add()
    {
        $data = Users::all();
        // dd($data->all());
        return view('lap.lap-add',['data' => $data]);
    }
    public function store(Request $request)
    {
       $official = official_report::create([
            'user_id' => Auth::user()?->id,
            'instansi' => $request->instansi,
            'address' => $request->address,
            'client' => $request->client,
            'position' => $request->position,
            'time' => $request->time,
            'distance' => $request->distance,
            'vehicle' => $request->vehicle,
            'notes' => $request->notes,
       ]);
       if($request->file('files')){
           $alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

           foreach ($request->file('files') as $file)
           {
               $extension = $file->getClientOriginalExtension();
               $random = substr(str_shuffle($alphanumeric), 0, 4);
               $filename = $official->name.'-'.$random.now()->timestamp.'.'.$extension;
               $file->move(public_path('uploads/lapangan'),$filename);

               Picture::create([
                   'official_report_id' => $official->id,
                   'image' => $filename
               ]);
           }
       }
       return redirect('official')->with('success','Official Report Added successfuly');
    }
    public function edit($id)
    {
        $data = official_report::findOrFail($id);
        return view('lap.lap-edit',['official' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = official_report::findOrFail($id);
        $data->update([
            'instansi' => $request->instansi,
            'address' => $request->address,
            'client' => $request->client,
            'position' => $request->position,
            'time' => $request->time,
            'distance' => $request->distance,
            'vehicle' => $request->vehicle,
            'notes' => $request->notes,
        ]);
        
        $alphanumeric = '0123456789ABCDEFGHJKLMNOPQRSTUWXYZabcdefhjklmnopqrstuvwxyz';
        if($request->file('files')){
            foreach ($request->file('files') as $file){
                $extension = $file->getClientOriginalExtension();
                $random = substr(str_shuffle($alphanumeric),0,4);
                $filename = $official->name.'-'.$random.now()->timestamp.'.'.$extension;
                $file->move(public_path('uploads/lapangan'), $filename);

                Picture::create([
                    'official_report_id' => $data->id,
                    'image' => $filename
                ]);
            }
        }
        return redirect('official')->with('success','Official Report Added successfuly');
    }
    public function destroy($id)
    {
        official_report::where('id',$id)->delete();
        return redirect('official')->with('success','Official Report Deleted successfully');
    }
    public function detail($id)
    {
        $data = official_report::find($id);
        return view('lap.detail',['data' => $data]);
    }
    public function export_pdf($id)
    {
        $data = official_report::findOrFail($id);
        $pictures = [];

        foreach($data->pictures as $picture) {
            $pictures[] = base64_encode(file_get_contents('uploads/lapangan/'.$picture->image));
        }

        $pdf = PDF::loadview('lap.export-pdf',[
            'data' => $data,
            'pictures' => $pictures
        ]);
        return $pdf->stream('export-pdf');
    }
    public function cetakForm()
    {
        return view('lap.pdf');
    }
    public function cetakClientPertanggal($tglawal, $tglakhir)
    {
        $reports = official_report::whereBetween('created_at', [$tglawal,$tglakhir]  )->get();
        $pictures = [];   

        foreach($reports as $report) {    
            $temp = [];
            foreach($report->pictures as $picture) {
                $temp[] = base64_encode(file_get_contents('uploads/lapangan/'.$picture->image));
            }

            $pictures[$report->id] = $temp;
        }

        $data = [
            'reports' => $reports,
            'pictures' => $pictures,
        ];

        $pdf = PDF::loadView('lap.export_by_date', $data);
        return $pdf->stream('export-pdf');
    }
	
 
}