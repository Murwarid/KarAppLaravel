<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Session; 
use App\Users;

class HomeController extends Controller
{
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
        return view('home');
    }

    public function mainPage(){
        
  
    return view('Karapp.main');
    }


    public function userdata(){
        $search=\Request::get("search");
        
        if(isset($search)){
            $users = DB::select("SELECT users.*, province.pName FROM users INNER JOIN province ON province.id= users.province_id WHERE users.name LIKE '".$search."%'");
            // $users = DB::table('users')
            //         ->join('province', 'province.id','=', 'users.province_id')
            //         ->where(['users.status1'=>'pending', "users.name" => 'like','%'.$search.'%'])
            //         ->select('users.*', 'province.pName')->paginate(10);
                    $data = array('users'=>$users);
                    return view('Karapp.users', $data);
                }else{
                    $users = DB::table('users')
                    ->join('province', 'province.id','=', 'users.province_id')
                    // ->where(['users.isphoneverified'=>'no', 'users.type'=>'normal'])
                    ->select('users.*', 'province.pName')->paginate(10);
                    $data = array('users'=>$users);
                }
        
                    return view('Karapp.users', $data);
        }

        public function deleteUser($id){
   
            $delete = DB::table("users")->where('id', '=', $id)->delete();
        
            return back();
        } 

     public function Postsdata(){


        $province_id=\Request::get("province_id");
        $cat_id=\Request::get("cat_id");
        $search = \Request::get('search');
 
        

        if($province_id>77){
            $PostData = DB::SELECT("SELECT u.name,u.id as u_id,u.last_name,u.image,u.phone, pr.pName,u.job ,cat.Cname, p.*, IFNULL(f.id,0) as status, f.id as f_id
            FROM post as p LEFT JOIN favorite as f ON p.id=f.p_id
            INNER JOIN users as u ON u.id=p.user_id INNER JOIN province as pr ON pr.id=p.province_id INNER JOIN category as cat ON cat.id=p.cat_id WHERE pr.id='".$province_id."' OR cat.id='".$cat_id."'  GROUP BY p.id, u.id, p.user_id, p.cat_id, p.province_id, p.title, p.text, p.image, p.adress, u.name, u.last_name, u.image, u.phone, pr.pName, u.job, cat.Cname, f.id");
       

        $province = DB::table('province')->select()->get();
        $category = DB::table('category')->select()->get();

        $data = array(
            'PostData' =>$PostData,
            'province'=>$province,
            'category'=>$category

    );
        return view('Karapp.posts', $data);
    }else{
        $PostData = DB::SELECT("SELECT u.name,u.id as u_id,u.last_name,u.image,u.phone, pr.pName,u.job ,cat.Cname, p.*, IFNULL(f.id,0) as status, f.id as f_id
        FROM post as p LEFT JOIN favorite as f ON p.id=f.p_id
        INNER JOIN users as u ON u.id=p.user_id INNER JOIN province as pr ON pr.id=p.province_id INNER JOIN category as cat ON cat.id=p.cat_id GROUP BY p.id, u.id, p.user_id, p.cat_id, p.province_id, p.title, p.text, p.image, p.adress, u.name, u.last_name, u.image, u.phone, pr.pName, u.job, cat.Cname, f.id");


        $province = DB::table('province')->select()->get();
        $category = DB::table('category')->select()->get();

        $data = array(
            'PostData' =>$PostData,
            'province'=>$province,
            'category'=>$category

    );
    }

    return view('Karapp.posts', $data );

    }    
    
    public function deletePosts($id){
   
            $delete = DB::table("post")->where('id', '=', $id)->delete();
        
            return back();
    }   

    public function deleteReports($id){
   
        $delete = DB::table("report")->where('id', '=', $id)->delete();
    
        return back();
} 


     public function user_report(){
   
           
        $PostData = DB::table("report")
        ->Join('users', 'users.id', '=', 'report.user_reported')
        ->select('report.*','users.id as u_id', 'users.name', 'users.last_name', 'users.image')
        ->where('type', '=', 'u')->get();
    
        $data = array(
            'PostData' =>$PostData
    );
    

    return view('Karapp.userReport', $data );
    }

    
    public function post_report(){
   
        $PostData = DB::table("report")
        ->Join('post', 'post.id', '=', 'report.p_id')
        ->select('report.*','post.id as p_id', 'post.title','post.text', 'post.image as p_image')
        ->where('type', '=', 'p')->get();
    
        $data = array(
            'PostData' =>$PostData
    );
    

    return view('Karapp.postReport', $data );
}


public function userregister(Request $request){
    $pSave = new Users;
    $pSave->name = $request->name;
    $pSave->last_name = $request->last_name;
    $pSave->email = $request->email;
    $pSave->password = Hash::make($request->password);
    $pSave->image = $request->file('img')->store("images");
    $pSave->save(); 
    Auth::logout();
    Session::flush();
    Session::flash("addmsg", "موفقانه ثبت شد"); 
    return redirect('login');
    }


    public function editUserProfiles(){
        $user_id = \Auth::user()->id;
        $user_name = \Auth::user()->name;
        $user_last_name = \Auth::user()->last_name;
        $user_email= \Auth::user()->email;

        $data = array(
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_last_name'=>$user_last_name,
            'user_email'=>$user_email
        );
        return view('Karapp.editUserProfile', $data);
    }

    public function updateProfile(Request $request){
    
        if($request->img!=null){
            $image= $request->file('img')->store("images");
            $password = Hash::make($request->password);
        $update = DB::table('users')->where('id', $request->id)->update([
           'name'=>$request->name,
           'last_name'=>$request->last_name,
           'email'=>$request->email,
           'image'=>$image,
           'password'=>$password,
        ]);
        }else if($request->password!=null){
            $password = Hash::make($request->password);
            $update = DB::table('users')->where('id', $request->id)->update([
               'name'=>$request->name,
               'last_name'=>$request->last_name,
               'email'=>$request->email,
               'password'=>$password,
            ]);
        }else{
            $update = DB::table('users')->where('id', $request->id)->update([
                'name'=>$request->name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
             ]);
        }
        return redirect('mainpage');
    }


    public function UserPosts($id){
   
        $PostData = DB::table("post")
        ->Join('users', 'users.id', '=', 'post.user_id')
        ->select('post.id','post.image as pimage', 'post.title','post.adress', 'post.text','users.id as u_id', 'users.name', 'users.last_name', 'users.image as u_image')
        ->where('users.id', '=', $id)->get();
    
        $data = array(
            'PostData' =>$PostData
    );
    

    return view('Karapp.userPost', $data);
}

}
