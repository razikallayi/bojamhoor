<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	const IMAGE_LOCATION ="uploads/banner";

	protected $fillable = [
		'title',
		'slug',
		'url',
		'image',
		
		'is_featured',
		'is_published',
		'listing_order',
		'status',
	];

	public function detailPageUrl(){
		return $this->url;
	}

	public function imageUrl($imageName=null,$width=null,$height=null){
		if(is_null($imageName)){
			if(is_null($this->image)){
				return;
			}
			$imageName= $this->image;
			if(!file_exists(self::IMAGE_LOCATION."/".$imageName)) {
				return ;
			}
		}
		if($width!=null && $height !=null){
			$thumbName= $width."_".$height."_".substr($imageName,0,-4);
			$original = self::IMAGE_LOCATION."/".$imageName;
			if(file_exists($thumbName)) {
				$imageName= $thumbName;
			}else{
				if( !file_exists($original)){
					return;
				}
				$imageDetails = Helper::uploadImage($original,self::IMAGE_LOCATION,$thumbName,$width,$height);
				$imageName =  $imageDetails->getData()->filename;
			}
		}
		return url(self::IMAGE_LOCATION."/".$imageName);
	}
}
