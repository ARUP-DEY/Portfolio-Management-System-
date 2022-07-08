<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use App\contact;
use App\experience;
use App\project;
use App\service;
use App\skill;
use App\about;
use DB;

class ViewController extends Controller
{
    public function index()
    {
        $select = DB::table('abouts')->orderBy('updated_at', 'desc')->first();
        return view ('index',[
            'abouts'=>$select
        ]);
        
    }
    public function aboutview(){
        //$select = about::all();
        $select = DB::table('abouts')->orderBy('updated_at', 'desc')->first();
        return view ('about',[
            'abouts'=>$select
        ]);
    }
    public function skillview(){
        $select = skill::all();
        return view ('skills',[
            'skill'=>$select
        ]);
    }

    public function projectview(){
        $select = project::all()->where('status',1);
        return view ('projects',[
            'project'=>$select
        ]);
    }
    public function projectsdetails(Request $request){

        $projectsDetails = project::where('project_id',$request->id)->first();
//dd($select);
        return view ('project_details',[
            'projects'=>$projectsDetails
        ]);
    }

    public function experienceview(){
        $select = experience::all();
        return view ('experience',[
            'experience'=>$select
        ]);
    }

    public function blogview(){
        $select = blog::all();
        return view ('blog',[
            'blog'=>$select
        ]);
    }
 public function blogdetails(Request $request){

        $blogDetails = blog::where('blog_id',$request->id)->first();
//dd($select);
        return view ('blog_details',[
            'blog'=>$blogDetails
        ]);
    }
    public function serviceview(){
        $select = service::all();
        
        $basic = service::where('type','=','basic')->get();
        $pro = service::where('type','=','pro')->get();
        $premium = service::where('type','=','premium')->get();

        return view ('services',[
            'basic'=>$basic,
            'pro'=>$pro,
            'premium'=>$premium
        ]);
    }

    public function contactview(){
        $select = contact::all();
        return view ('contact',[
            'contact'=>$select
        ]);
    }
 
   /* public function serviceview(){
        $select = User::all();
        $select = User::where('name','=','harsh')->get();
        return view ('about',[
            'name'=>$select
        ]);
    }*/
}
