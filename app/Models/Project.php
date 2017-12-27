<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;

class Project extends Model
{
	const IMAGE_LOCATION = "uploads/projects";

	protected $fillable = ['category','title','description','type','client','client_address','project_value','currency','completion_date','slug','latitude','longitude','google_map_place_id','is_featured','listing_order'];

	const CATEGORIES = [
		'1'=>['id'=>'1', 'name' => 'Completed'],
		'2'=>['id'=>'2', 'name' => 'Ongoing'],
		'3'=>['id'=>'3', 'name' => 'Upcoming'],
	];

	protected $dates =['completion_date'];

	public function images(){
	    return $this->medias()->where('file_type','image');
	}

	public function getProjectStatus(){
	    return self::CATEGORIES[$this->category]['name'];
	}

	public function videos(){
	    return $this->medias()->where('file_type','video');
	}


	public function medias(){
	    return $this->hasMany('App\Models\Media','item_id','id')
	            ->where('table_name',$this->getTable())
	            ->orderBy('listing_order','desc');
	}

	
    public function detailPageUrl(){
        return url('projects/'.$this->slug);
    }


	    public function imageUrl($imageName=null,$width=null,$height=null){
	    if(is_null($imageName)){
	        if(is_null($this->images) || $this->images->isEmpty()){
	            return;
	        }
	        $imageName= $this->images->first()->file_name;
	        if(!file_exists(self::IMAGE_LOCATION."/".$imageName)) {
	            return ;
	        }
	    }
	    if($width!=null && $height !=null){
	        $thumbName= $width."_".$height."_".$imageName;
	        $original = self::IMAGE_LOCATION."/".$imageName;
	        if(file_exists(self::IMAGE_LOCATION."/".$thumbName)) {
	            $imageName= $thumbName;
	        }else{
	            if( !file_exists($original)){
	                return;
	            }
	            $imageDetails = Helper::uploadImage($original,self::IMAGE_LOCATION,substr($thumbName,0,-4),$width,$height);
	            $imageName =  $imageDetails->getData()->filename;
	        }
	    }
	    return url(self::IMAGE_LOCATION."/".$imageName);
	}
}
