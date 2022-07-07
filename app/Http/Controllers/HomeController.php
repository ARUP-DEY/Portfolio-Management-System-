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
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Auth;
use Redirect;

class HomeController extends Controller
{
    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/admin/index');
    }
    public function aboutview(){
        $aboutUsData = about::all();
        return view ('/admin/about',[
            'aboutUsData'=>$aboutUsData
        ]);
    }

    public function editAboutUs(Request $request){
        $aboutId = $request->id;
        //dd($aboutId);
        $aboutUsData = about::where('about_id',$aboutId)->first();
        //dd($aboutUsData);
        return view ('/admin/about/edit_about',[
            'aboutUsData'=>$aboutUsData
        ]);

    }
 public function deleteAboutUsData(Request $request){
    //echo $request->id;exit;
    $alldata=DB::table('abouts')
            ->where('about_id', $request->id)->delete();

        if($alldata){
            echo 1;exit;
        }else{
            echo 0;exit;
        }

}

    //Update About
    public function updateabout(Request $request)
    {
        
       $fname = $request->input('fname');
       $mname = $request->input('mname');
       $lname = $request->input('lname');
       $descr = $request->input('descr');
       $birthday = $request->input('birthday');
       $age = $request->input('age');
       $email = $request->input('email');
       $interests = $request->input('interests');
       $website = $request->input('website');
       $study = $request->input('study');
       $twitter = $request->input('twitter');
       $degree = $request->input('degree');
       $city = $request->input('city');
        $about_id=$request->updateId;
        //dd($about_id);
        

        if($request->hasfile('pimage')){
            $file = $request->file('pimage');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/about_profile/', $filename);
        }else{
            $alldata=DB::table('abouts')
            ->where('about_id', $about_id)->first();
//dd($alldata);
            $filename = $alldata->pimage;
        }

        if($request->hasfile('cv')){
            $file = $request->file('cv');
            $ext = $file->getClientOriginalExtension();
            $filecv = time().'.'.$ext;
            $file->move('uploads/upload_cv/', $filecv);
        }else{
            $alldata=DB::table('abouts')
            ->where('about_id', $about_id)->first();
//dd($alldata);
            $filecv = $alldata->cv;
        }

        $fname=$request->fname;
        $mname=$request->mname;
        $lname=$request->lname;
        $descr=$request->descr;
        $birthday=$request->birthday;
        $age=$request->age;
        $email=$request->email;
        $interests=$request->interests;
        $website=$request->website;
        $study=$request->study;
        $twitter=$request->twitter;
        $degree=$request->degree;
        $city=$request->city;       

        DB::table('abouts')
            ->where('about_id', $about_id)
            ->update([
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'pimage' => $filename,
                'cv' => $filecv,
                'descr' => $descr,
                'birthday' => $birthday,
                'age' => $age,
                'email' => $email,
                'interests' => $interests,
                'website' => $website,
                'study' => $study,
                'twitter' => $twitter,
                'degree' => $degree,
                'city' => $city,
                
            ]);
        
        return redirect('/admin/about');
    }


    public function updateskill(Request $request)
    {
        $nu=1;
        switch($request->up)
        {
        case 'c': 
        DB::update('UPDATE skills SET css=? WHERE id=?',[$request->css, $nu]);
        break;
        case 'j':
        DB::update('UPDATE skills SET javascript=? WHERE id=?',[$request->javascript, $nu]);
        break;
        case 'w':
        DB::update('UPDATE skills SET wordpress=? WHERE id=?',[$request->wordpress, $nu]);
        break;
        case 'p':
        DB::update('UPDATE skills SET php=? WHERE id=?',[$request->php, $nu]);
        break;
        case 'j':
        DB::update('UPDATE skills SET jquery=? WHERE id=?',[$request->jquery, $nu]);
        break;
        case 'm':
        DB::update('UPDATE skills SET mysql=? WHERE id=?',[$request->mysql, $nu]);
        break;
        case 'a':
        DB::update('UPDATE skills SET angular=? WHERE id=?',[$request->angular, $nu]);
        break;
        case 'h':
        DB::update('UPDATE skills SET html=? WHERE id=?',[$request->html, $nu]);
        break;
        }
        return redirect('/admin/skills');
    }
    public function skillview(){
        $select = skill::all();
        return view ('/admin/skills',[
            'skill'=>$select
        ]);
    }


    public function updatexperience(Request $request)
    {
        $nu=1;
        $nv=2;
        $nw=3;
        $nx=4;
        
        switch($request->up)
        {
        case '1': 
        DB::update('UPDATE experiences SET pos_name=?,pos_company=?,pos_descr=? WHERE experience_id=?',[$request->pos_name, $request->pos_company,$request->pos_descr,$nu]);
        break;
        case '2':
        DB::update('UPDATE experiences SET pos_name=?,pos_company=?,pos_descr=? WHERE experience_id=?',[$request->pos_name, $request->pos_company,$request->pos_descr,$nv]);
        break;
        case '3':
        DB::update('UPDATE experiences SET pos_name=?,pos_company=?,pos_descr=? WHERE experience_id=?',[$request->pos_name, $request->pos_company,$request->pos_descr,$nw]);
        break;
        case '4': 
        DB::update('UPDATE experiences SET pos_name=?,pos_company=?,pos_descr=? WHERE experience_id=?',[$request->pos_name, $request->pos_company,$request->pos_descr,$nx]);
        break;
        
        }
        return redirect('/admin/experience');
    }



//UPDATE PROJECT
    public function updateproject(Request $request)
    {
        //dd($request->all());
        // Form validation
        // $request->validate([
        //     'project_name'  =>  'required',
        //     'project_descr' =>  'required',
        //     'project_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        
        $name = $request->input('project_name');
        $descr = $request->input('project_descr');
        $status = $request->input('status');
        $project_id=$request->up;
        //dd($descr);
        

        if($request->hasfile('project_image')){
            $file = $request->file('project_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/profile/', $filename);
        }else{
            $alldata=DB::table('projects')
            ->where('project_id', $project_id)->first();
//dd($alldata);
            $filename = $alldata->project_image;
        }

        $project_descr = $request->project_descr;
        $status = $request->status;        

        DB::table('projects')
            ->where('project_id', $project_id)
            ->update([
                'project_name' => $name,
                'project_image' => $filename,
                'project_descr' => $descr,
                'status' => $status
            ]);     
        
        
        
        return redirect('/admin/project');
    }


//UPDATE BLOG

    public function updateblog(Request $request)
    {
        $title = $request->input('blog_title');
        $descr = $request->input('blog_descr');
        $link = $request->input('blog_link');
        $status = $request->input('blog_status');
        $blog_id=$request->up;

     //dd($request->all());
        if($request->hasfile('blog_image')){
            $file = $request->file('blog_image');
        //dd($file);
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/blog_profile/', $filename);
        }else{
            $alldata=DB::table('blogs')
            ->where('blog_id', $blog_id)->first();
//dd($alldata);
            $filename = $alldata->blog_image;
        }


        $blog_descr = $request->blog_descr;
        $blog_status = $request->blog_status;
        $link = $request->blog_link;        

        DB::table('blogs')
            ->where('blog_id', $blog_id)
            ->update([
                'blog_title' => $title,
                'blog_image' => $filename,
                'blog_descr' => $descr,
                'blog_status' => $status,
                'blog_link' => $link
            ]);
        
        
         return redirect('/admin/blog');
        }
       
    


    public function updatecontact(Request $request)
    {
        
        
        switch($request->up)
        {
        case '1': 
        DB::update('UPDATE contacts SET contact_address=?,contact_email=?,contact_no=?,contact_website=? WHERE contact_id="1"',[$request->contact_address, $request->contact_email,$request->contact_no,$request->contact_website]);
        break;
        
        
        }
        return redirect('/admin/contact');
    }


    public function updateservices(Request $request)
    {
        
        
        switch($request->up)
        {
        case '1': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="1"',[$request->service_name]);
        break;
        case '2':
        DB::update('UPDATE services SET service_name=? WHERE service_id="2"',[$request->service_name]);
        break;
        case '3':
        DB::update('UPDATE services SET service_name=? WHERE service_id="3"',[$request->service_name]);
        break;
        case '4': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="4"',[$request->service_name]);
        break;
        case '5': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="5"',[$request->service_name]);
        break;
        case '6': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="6"',[$request->service_name]);
        break;
        case '7': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="7"',[$request->service_name]);
        break;
        case '8': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="8"',[$request->service_name]);
        break;
        case '9': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="9"',[$request->service_name]);
        break;
        case '10': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="10"',[$request->service_name]);
        break;
        case '11': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="11"',[$request->service_name]);
        break;
        case '12': 
        DB::update('UPDATE services SET service_name=? WHERE service_id="12"',[$request->service_name]);
        break;
        
        }
        return redirect('/admin/services');
    }
    

    public function projectview(){
        $select = project::all();

        return view ('/admin/project',[
            'project'=>$select
        ]);
    }

    public function experienceview(){
        $select = experience::all();
        return view ('/admin/experience',[
            'experience'=>$select
        ]);
    }

    public function blogview(){
        $select = blog::all();
        return view ('/admin/blog',[
            'blog'=>$select
        ]);
    }

    public function serviceview(){
        $select = service::all();
        $basic = service::where('type','=','basic')->get();
        $pro = service::where('type','=','pro')->get();
        $premium = service::where('type','=','premium')->get();

        return view ('/admin/services',[
            'basic'=>$basic,
            'pro'=>$pro,
            'premium'=>$premium,
            'select'=>$select
        ]);
    }

    public function contactview(){
        $select = contact::all();
        return view ('/admin/contact',[
            'contact'=>$select
        ]);
    }




//PROJECT//
 public function add(){
        
        return view ('/admin/project/add_project');
    }

     public function addproject(Request $request){
        dd($request->all());
        $project_name = $request->project_name;
        $filename='';

        if($request->hasfile('project_image')){
            $file = $request->file('project_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/profile/', $filename);
        }

        $project_descr = $request->project_descr;
        $status = $request->status;

        $Project = new project;

        $Project->project_name = $project_name;
        $Project->project_image = $filename;
        $Project->project_descr = $project_descr;
        $Project->status = $status;
        $Project->uniqueid = Auth::id();

        
        //dd($Project);
        $Project->save();
        return Redirect::back();

        
    }



    //SERVICES//
    // public function add(){
        
    //     return view ('/admin/project/add_project');
    // }

    public function addS(){
        return view('/admin/services/add_services');
    }
    public function addservices(Request $request){
            $type = $request->type; 
            $service_name = $request->service_name;

        $Service = new service;

        $Service->type = $type;
        $Service->service_name = $service_name;
        $Service->uniqueid = Auth::id();

        
        //dd($Service);
        $Service->save();
        return Redirect::back();
    }


    //Blog
    public function addB(){
        
        return view ('/admin/blog/add_blog');
    }

     public function addblog(Request $request){
        //dd($request->all());
        $blog_title = $request->blog_title;
        

        if($request->hasfile('blog_image')){
            $file = $request->file('blog_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/blog_profile/', $filename);
        }

        $blog_descr = $request->blog_descr;
        $blog_link = $request->blog_link;
        $blog_status = $request->blog_status;

        $Blog = new blog;

        $Blog->blog_title = $blog_title;
        $Blog->blog_image = $filename;
        $Blog->blog_descr = $blog_descr;
        $Blog->blog_link = $blog_link;
        $Blog->blog_status = $blog_status;
        //$Blog->uniqueid = Auth::id();

        
        //dd($Blog);
        $Blog->save();
        return Redirect::back();       
    }


//About
    public function addA(){
        
        return view ('/admin/about/add_about');
    }

     public function addabout(Request $request){
        //dd($request->all());
        $fname = $request->fname;
        $mname = $request->mname;
        $lname = $request->lname;
        $filename ='';
        if($request->hasfile('pimage')){
            $file = $request->file('pimage');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/about_profile/', $filename);
        }

        if($request->hasFile('cv')) {
        $file = $request->file('cv');
        $ext = $file->getClientOriginalExtension();
        $filecv =  time().'.'.$ext;

        $file->move('uploads/upload_cv/', $filecv );
    }
                
                


        $descr = $request->descr;
        $birthday = $request->birthday;
        $age = $request->age;
        $email = $request->email;
        $interests = $request->interests;
        $website = $request->website;
        $study = $request->study;
        $twitter = $request->twitter;
        $degree = $request->degree;
        $city = $request->city;

        $About = new about;

        $About->fname = $fname;
        $About->mname = $mname;
        $About->lname = $lname;
        $About->pimage = $filename;
        $About->cv = $filecv;
        $About->descr = $descr;
        $About->birthday = $birthday;
        $About->age = $age;
        $About->email = $email;
        $About->interests = $interests;
        $About->website = $website;
        $About->study = $study;
        $About->twitter = $twitter;
        $About->degree = $degree;
        $About->city = $city;
        $About->uniqueid = Auth::id();

        
        //dd($About);
        $About->save();
        return Redirect::back();       
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
