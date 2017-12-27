<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Project;
use App\Models\Media;
use Session;
use Validator;
use Image;
use File;



class ProjectController extends Controller
{
    // index

    public function index()
    {
       $projects = Project::orderBy('updated_at','desc')->get();
       return view('admin.projects.manage',compact('projects'));
    }

    public function create($id=null)
    {
        if($id != null){
            $project = Project::find($id);
        }

        return view('admin.projects.create',compact('project'));
    }

   public function saveImage(Request $request){
       $this->validate($request, [
           'image' => 'required',
           'location' => 'required' ,
       ]);

       $uploadImage=$request->image;
       $location = str_finish(Project::IMAGE_LOCATION, '/');

       return Helper::uploadImage($uploadImage, $location);
   }



    public function store($id=null,Request $request)
    {

        if($id==null){
            $update = false;
            $imageRule = 'required';
        }else{
            $update= true;
            $project=Project::find($id);
            $imageRule = '';
        }
      $rule=[
            //'category' => 'required',
            'title' => 'required',
            'type' => '',
            'project_value'=> '',
            'completion_date'=>'nullable|date',
            'description'=>'',
            'client'=>'',
            ];

           $this->validate($request,$rule);

        $request['slug'] = str_slug($request->title);
        if($update){
            $updated = 'Updated';
            $project->update($request->all());
        } 
        else 
        {
            $updated = 'Added';
            $project=Project::create($request->all());
        }

        if($request->hasFile('image')){
            $location=Project::IMAGE_LOCATION;
            $errorCount=0;
            foreach($request->file('image') as $img) 
            {
                $imageDetails = Helper::uploadImage($img, $location);
                $uploadedImage = $imageDetails->getData();
                if(!$uploadedImage->success){
                    $errorCount++;
                    continue;
                }
                $filename = $uploadedImage->filename;

                $media = new Media;
                $media->file_name = $filename;
                $media->file_type = 'image';
                $media->location = $location;
                $media->table_name = $project->getTable();
                $media->item_id = $project->id;
                $media->save();
            }
            if($errorCount > 0){
                $warningMessage = "<b>".$errorCount ."</b> images were not uploaded due to unsupported format/content.";
                session()->flash('status','alert-warning');
                session()->flash('message','Successfully '.$updated.' <b>'.$project->title.'</b>!<br/>'.$warningMessage);
                return back();
            }
        }


        if($project){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully '.$updated.' <b>'.$project->title.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Failed!');
        }

        return back();

    }

        public function destroy($id=null){
            if($id!=null){
                $project = Project::findOrFail($id);
                $location = str_finish(Project::IMAGE_LOCATION, '/');
                foreach ($project->medias as $media) {
                    $filename = $media->file_name;
                    if($filename!=null){
                        if(file_exists($location.$filename)){
                            unlink($location.$filename);
                        }
                    }
                    $media->delete();
                }
                $isDeleted = $project->delete();
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


        public function deleteImage(Request $request)
        {
            $this->validate($request, [
                'filename' => 'required'
            ]);
            $location = str_finish(Project::IMAGE_LOCATION, '/');
            $filename = $request->filename;

            $imageid = Media::where('file_name',$filename)->first(['id']);
            if($imageid !=null){
                $imageid->delete();
            }
            if(file_exists($location.$filename)){
                unlink($location.$filename);
            }
            return response()->json(['status'=>'success']);

        }


        public function sortImage(Request $request)
        {
            $this->validate($request, [
                'sort' => 'required|array',
                'itemId' => 'required|numeric',
            ]);
            $counter = Media::where('item_id',$request->itemId)->count();
            foreach ($request->sort as $image) {
                Media::where('file_name', 'like',$image."%")
                ->where('item_id',$request->itemId)
                ->update(['listing_order' => $counter--]);
            }
            return;
        }

        public function sort(Request $request)
        {
            $this->validate($request, [
                'sort' => 'required|array'
            ]);
            $counter = Project::count();
            foreach ($request->sort as $id) {
                Project::where('id', $id)
                ->update(['listing_order' => $counter--]);
            }
            return;
        }


}
