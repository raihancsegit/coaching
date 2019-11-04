<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function addSlide(){
        return view('admin.slider.slide-add-form');
    }

    public function uploadSlide(Request $request){
        $this->validate($request,[
            'slide_image' => 'required',
            'slide_title' => 'required',
            'slide_description' => 'required',
            'status' => 'required',

        ]);

        $data = new Slide();
        $data->slide_image = $this->createSlide($request);
        $data->slide_title = $request->slide_title;
        $data->slide_description = $request->slide_description;
        $data->status = $request->status;
        $data->save();

        return back()->with('message','Slider Added Successfully');

    }

    public function createSlide($request){
        $file = $request->file('slide_image');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/slider/';
        $imageUrl = $directory.$imageName;
        //$file->move($directory,$imageUrl);
        Image::make($file)->resize(1400,570)->save($imageUrl);

        return $imageUrl;
    }
}
