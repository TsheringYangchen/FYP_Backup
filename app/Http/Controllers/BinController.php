<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Bin;
use DB;
use PDF;
use App\Issuer;
use App\License;

class BinController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'license_no' => 'required',
            'license_name' => 'required',
            'cid' => 'required',
            'violation_date' => 'required',
            'image' => 'required',
        ]);
       // Upload the image
       if ($request->hasFile('image')) {
        $image = $request->image;
        $image->move('uploads/bin', $image->getClientOriginalName());
        }
        //Save the products
       bin::create([
        'license_no' => $request->license_no,
        'license_name' => $request->license_name,
        'cid' => $request->cid,
        'violation_date' => $request->violation_date,
        'image' => $request->image->getClientOriginalName()
            
        ]);
        $request->session()->flash('msg', 'BIN Issued successfully');
        // Redirect to
        return view('front/bin');
    }

    public function search()
      {
          $q = Input::get('q');
          if($q != "")
          {
              $issuers = Bin::where('license_no', 'LIKE', '%'.$q.'%')
                             ->get();
          if(count($issuers) > 0)                    
              return view('admin.searchBin',compact('issuers'));
          }
          return redirect('/admin/viewbin')->with('msg','No results found');
  
      }

    public function viewbin()
    {
        $issuer = Bin::paginate(10);     
          return view('admin.viewbin',['issuers'=>$issuer]);
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_issuers_to_html());
        return $pdf->stream();  
    }

    public function convert_issuers_to_html()
    {
        $issuers = $this->viewbin();
        $output = '
            <h3>Summary of the Infringement</h3>
            <table class="table table-responsive table-bordered">
            <thead class="table-dark text-center">
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">License No</th>
                    <th scope="col">Name</th>
                    <th scope="col">CID No</th>
                    <th scope="col">Violation Date</th>
                
            </tr>
        ';
        foreach ($issuers as $issuer)
        {
            $output .='
            <tr>
                <td>{{ $issuer->id}}</td>
                <td>{{ $issuer->license_no}}</td>
                <td>{{ $issuer->license_name}}</td>
                <td>{{ $issuer->cid}}</td>
                <td>{{ $issuer->violation_date}}</td>
            </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }


}