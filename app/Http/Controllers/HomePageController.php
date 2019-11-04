<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;
use DB;

class HomePageController extends Controller
{
    public function addHeaderFooterForm(){
        $headerfooter = DB::table('header_footers')->first();
        if(isset($headerfooter)){
            return view('admin.home.manage-header-footer-form',['headerfooter' => $headerfooter]);
        }else {
            return view('admin.home.add-header-footer-form');
        }
    }
    public function headerAndFooterSave(Request $request){
            //return $request->all();

         $this->headerFooterValidate($request);
        $data = new HeaderFooter();
        $data->owner_name = $request->owner_name;
        $data->owner_department = $request->owner_department;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->copyright = $request->copyright;
        $data->status = $request->status;
        $data->save();

        return redirect("/home")->with('message',"Header Footer Added Success");
    }
    public function manageHeaderFooter($id){
        $headerfooter = HeaderFooter::find($id);
        return view('admin.home.manage-header-footer-form',['headerfooter' => $headerfooter]);
    }

    public function headerFooterUpdate(Request $request){
        $this->headerFooterValidate($request);
        $headerfooter = HeaderFooter::find($request->id);
        $headerfooter->owner_name = $request->owner_name;
        $headerfooter->owner_department = $request->owner_department;
        $headerfooter->mobile = $request->mobile;
        $headerfooter->address = $request->address;
        $headerfooter->copyright = $request->copyright;
        $headerfooter->save();

        return redirect("/home")->with('message',"Header Footer Update Success");
    }
    protected function headerFooterValidate($request){
        $this->validate($request,[
            'owner_name' => 'required',
            'owner_department' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'copyright' => 'required',

        ]);
    }
}
