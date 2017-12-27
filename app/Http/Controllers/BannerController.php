<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Banner;
use App\Helpers\Helper;

class BannerController extends Controller
{

    public function index(Request $request)
    {
        $banners = Banner::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();

        return view('admin.banner.manage',compact('banners'));
    }


    public function create($id=null)
    {
        if($id != null){
            $banner = Banner::find($id);
        }


        return view('admin.banner.create',compact('banner'));
    }

    public function saveImage(Request $request){
        $this->validate($request, [
            'image' => 'required',
            'location' => 'required' ,
        ]);

        $uploadImage=$request->image;
        $location = str_finish(Banner::IMAGE_LOCATION, '/');

        return Helper::uploadImage($uploadImage, $location);
    }


    public function store($id=null,Request $request)
    {

        if($id==null){
            $update = false;
            $imageRule = 'required';
        }else{
            $update= true;
            $banner=Banner::find($id);
            $imageRule = '';
        }

        $rule= [
            'image'           => $imageRule,
            'url'             => 'url|nullable',
        ];

        $this->validate($request,$rule);

        $request['slug'] = str_slug($request->title);
        if($update){
            $updated = 'Updated';
            $banner->update($request->all());
        } 
        else 
        {
            $updated = 'Added';
            $banner=Banner::create($request->all());
        }

        if($banner){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully '.$updated.' <b>'.$banner->name.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Failed!');
        }

        return back();
    }



    public function destroy($id=null){
        if($id!=null){
            $banner = Banner::findOrFail($id);
            $location = str_finish(Banner::IMAGE_LOCATION, '/');
            $filename = $banner->image;
            if($filename!=null){
                if(file_exists($location.$filename)){
                    unlink($location.$filename);
                }
            }

            $isDeleted = $banner->delete();
            if($isDeleted){
                session()->flash('status','alert-success');
                session()->flash('message','Successfully Removed!');
            }else{
                session()->flash('status','alert-danger');
                session()->flash('message', 'Deleting Failed!');
            }
        }
        return back();
    }


    public function sort(Request $request)
    {
        $this->validate($request, [
            'sort' => 'required|array',
            'page' => 'required'
        ]);
        $counter = Banner::count();
        foreach ($request->sort as $id) {
            Banner::where('id', $id)
            ->update(['listing_order' => $counter--]);
        }
        return;
    }


}
