<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Banner;
use App\Models\Project;
use Illuminate\Http\Request;
use Mail;

class MasterController extends Controller
{
	public function index()
	{
		$banners = Banner::all();
		$latestProjects = Project::orderBy('created_at','desc')->limit(4)->get();
		return view('project.index',compact('banners','latestProjects'));
	}
	
	public function about()
	{
		return view('project.about');
	}

	public function projects()
	{
		$projects = Project::orderBy('updated_at','desc')->get();
		return view('project.projects',compact('projects'));
	}
		
	public function projectDetails($slug)
	{
		$relatedProjects = Project::orderBy('updated_at','desc')->limit(3)->get();
		$project = Project::where('slug',$slug)->firstOrFail();
		return view('project.project-details',compact('project','relatedProjects'));
	}
		
	public function resources()
	{
		return view('project.resources');
	}
			
	public function chairmanMessage()
	{
		return view('project.chairman-message');
	}
		
	public function policies()
	{
		return view('project.policies');
	}
	
	public function clients()
	{
		return view('project.clients');
	}
		
	public function career()
	{
		return view('project.career');
	}
	
	public function contact()
	{
		return view('project.contact');
	}

	public function contactMail(Request $request)
	{
		Mail::to(ContactMail::getDestinationEmails())->send(new ContactMail($request));
		if( count(Mail::failures()) > 0 ) {
			Session::flash('status','alert-danger');
			Session::flash('message','Sorry!An error occured!'.Mail::failures()[0]);
		} else {
			Session::flash('status','alert-success');
			Session::flash('message','Thank You! We will contact you soon!');
		}
		return back();
	}

}
