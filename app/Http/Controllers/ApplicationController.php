<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Hash;
use App\Users;
use Auth;
use DB;

class ApplicationController extends Controller
{
    //


    public function token(){
        $token = csrf_token();
        echo $token;
    }

    public function userregister(Request $request){
        $pic = $request->file('image')->store("images");  
        $pass = Hash::make($request->password); 

        $register = DB::table('users')->insert([
            'name'=>$request->name,
            'last_name' =>$request->last_name,
            'phone'=>(int)$request->phone,
            'job'=>$request->job,
            'password'=>$pass,
            'image'=>$pic,
            'province_id'=>(int)$request->province_id,
        ]);

        return response()->json([ $register ]);
    }

    // login
     public function mLogin(Request $request){
        if ( $user = Auth::attempt(['phone' =>  $request->phone, 'password' => $request->password])) {

                    $data['user'] = Auth::user();
                    $data['auth'] = ['isSuccussfull'=> true, 'message'=>'Loged in',];
            
        }else{
            $data['user'] = [
                "id" => 0,
                "name" => '',
                "last_name" => '',
                "image" => '',
            
            ];
            $data['auth'] = ['isSuccussfull'=> false, 'message'=>'Opps something is wrong!',];
        }   
        return response()->json([ $data ]);
    }

    public function getProvinces(){

        $province = DB::table('province')->select()->get();

     $data = array(
            'province'=> $province
        );
    return response()->json([ $data ]);
    }


    public function isEmailorPhoneExist(Request $request){
        $phone = (int)$request->phone;
        $phoneCount = DB::table("users")->select()->where(["phone"=>$phone])->count();

        $data = array(
            'phoneCount'=> $phoneCount
            
        );

    return response()->json([ $data ]);
    }

    public function PostSomething(Request $request){
        $pic = $request->file('image')->store("images"); 
        $post = DB::table('post')->insert(
            [
                'user_id'=>(int)$request->user_id,
                'cat_id'=>(int)$request->cat_id,
                'province_id'=>(int)$request->province_id,
                'title'=>$request->title,
                'text'=>$request->text,
                'adress'=>$request->adress,
                'image'=>$pic
            ]
        );

        return response()->json([ $post ]);
    }
////////////////////////
    public function getPosts(){


$PostData = DB::SELECT("SELECT u.name,u.id as u_id,u.last_name,u.image,u.phone, pr.pName,u.job ,cat.Cname, p.*, IFNULL(f.id,0) as status, f.id as f_id
 FROM post as p LEFT JOIN favorite as f ON p.id=f.p_id
 INNER JOIN users as u ON u.id=p.user_id INNER JOIN province as pr ON pr.id=p.province_id INNER JOIN category as cat ON cat.id=p.cat_id GROUP BY p.id, u.id, p.user_id, p.cat_id, p.province_id, p.title, p.text, p.image, p.adress, u.name, u.last_name, u.image, u.phone, pr.pName, u.job, cat.Cname, f.id");

        $data = array(
            'PostData'=> $PostData
            
        );

    return response()->json([ $data ]);

    } 
    public function getSinglePosts($id){


        $PostData = DB::table('post as p')
                    ->join('users as u', 'u.id', '=', 'p.user_id')
                    ->join('category as c', 'c.id', '=', 'p.cat_id')
                    ->join('province as pr', 'pr.id', '=', 'p.province_id')
                    ->where('p.id','=', $id)
                    ->select('p.*', 'u.name', 'u.last_name', 'u.phone' , 'u.id as user_id','u.image as u_image', 'u.job' ,'c.Cname', 'pr.pName')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            
        );

    return response()->json([ $data ]);

    }

      //get province

    public function getProvince(){
    $province = DB::table('province')->select()->get();

     $data = array(
            'isSuccussfull' => true,
            'province'=> $province
        );
    return response()->json([ $data ]);
}


public function SearchByProvince($id){

     $PostData = DB::table('post as p')
                    ->join('users as u', 'u.id', '=', 'p.user_id')
                    ->join('category as c', 'c.id', '=', 'p.cat_id')
                    ->join('province as pr', 'pr.id', '=', 'p.province_id')
                    ->where('pr.id','=', $id)
                    ->select('p.*', 'u.name', 'u.phone' ,'u.last_name', 'u.image as u_image', 'u.job' ,'c.Cname', 'pr.pName', 'c.Cname')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);



}


     //get category

    public function getCategory(){
    $category = DB::table('category')->select()->get();

     $data = array(
            'isSuccussfull' => true,
            'category'=> $category
        );
    return response()->json([ $data ]);
}


public function SearchByCategories($id){

     $PostData = DB::table('post as p')
                    ->join('users as u', 'u.id', '=', 'p.user_id')
                    ->join('category as c', 'c.id', '=', 'p.cat_id')
                    ->join('province as pr', 'pr.id', '=', 'p.province_id')
                    ->where('c.id','=', $id)
                    ->select('p.*', 'u.name', 'u.phone' ,'u.last_name', 'u.image as u_image', 'u.job' ,'c.Cname', 'pr.pName', 'c.Cname')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);


}

public function SearchByCPs(Request $request){

     $PostData = DB::table('post as p')
                    ->join('users as u', 'u.id', '=', 'p.user_id')
                    ->join('category as c', 'c.id', '=', 'p.cat_id')
                    ->join('province as pr', 'pr.id', '=', 'p.province_id')
                    ->where('c.id', $request->cid)
                    ->orWhere('pr.id', $request->pid)
                    ->select('p.*', 'u.name', 'u.phone' ,'u.last_name', 'u.image as u_image', 'u.job' ,'c.Cname', 'pr.pName', 'c.Cname')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);

}


public function PostSomethings(Request $request){

        $pic = $request->file('image')->store("images");  


        $register = DB::table('post')->insert([
            'user_id'=>(int)$request->user_id,
            'cat_id' =>(int)$request->cat_id,
            'province_id'=>(int)$request->province_id,
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$pic,
            'adress'=>(int)$request->adress,
        ]);

        return response()->json([ $register ]);
    }


public function getUserInfo($id)
{
    $PostData = DB::table('users as u')
    ->join("province as pr", 'pr.id', '=', 'u.province_id')
    ->where('u.id', '=', $id)->select('u.name','u.last_name', 'u.phone', 'u.job', 'u.image as u_image', 'u.password' , 'pr.id as province_id', 'pr.pName')->get();

     $count = DB::table('ratting')->where('user_id_r', '=', $id)->count('user_id');
    $sum = DB::table('ratting')->where('user_id_r', '=', $id)->sum('value');

    $average = $sum/$count;


    $data = array(
            'PostData'=> $PostData,
            'average'=>$average
            );
        
    return response()->json([ $data ]);

}

public function getUserPosts($id)
{
   
    $PostData = DB::table('post as p')
                    ->join('users as u', 'u.id', '=', 'p.user_id')
                    ->join('category as c', 'c.id', '=', 'p.cat_id')
                    ->join('province as pr', 'pr.id', '=', 'p.province_id')
                    ->where('u.id','=', $id)
                    ->select('p.*', 'u.name', 'u.phone' ,'u.last_name', 'u.image as u_image', 'u.job' ,'c.Cname', 'pr.pName', 'c.Cname')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);

}

public function getExpereinces($id){

    $PostData = DB::table('users as u')
                    ->join('experiences as ex', 'u.id', '=', 'ex.user_id')
                    ->where('u.id','=', $id)
                    ->select('u.*','ex.extitle', 'ex.duration', 'ex.id as ex_id')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);

}

public function getkills($id){

    $PostData = DB::table('users as u')
                    ->join('skills as s', 'u.id', '=', 's.user_id')
                    ->where('u.id','=', $id)
                    ->select('u.*','s.skill', 's.level', 's.id as s_id')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);

}


public function addExperiences(Request $request){

    $register = DB::table('experiences')->insert([
            'user_id'=>(int)$request->user_id,
            'extitle' =>$request->extitle,
            'duration'=>(int)$request->duration,
        ]);

        return response()->json([ $register ]);

}

public function addSkills(Request $request){

    $register = DB::table('skills')->insert([
            'user_id'=>(int)$request->user_id,
            'skill' =>$request->skill,
            'level'=>$request->level,
        ]);

        return response()->json([ $register ]);

}

public function deletekills($id){
    $delete = DB::table("skills")->Where('id', '=', $id)->delete();
    return response()->json([ $delete ]);
}


public function updatekills(Request $request){
    $update = DB::table("skills")
                    ->where('id','=',$request->id)
                    ->update(['skill'=>$request->skill, 'level'=>$request->level]);

    return response()->json([ $update ]);
}

public function deletexperiences($id){
    $delete = DB::table("experiences")->Where('id', '=', $id)->delete();
    return response()->json([ $delete ]);
}


public function updateexperiences(Request $request){
    $update = DB::table("experiences")
                    ->where('id','=',$request->id)
                    ->update(['extitle'=>$request->extitle, 'duration'=>(int)$request->duration]);

    return response()->json([ $update ]);
}

public function update_users_data(Request $request){

    $updatenName = DB::table('users')->where('id',$request->user_id)
            ->update([
                'name'=>$request->name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'job'=>$request->job
            ]);

    return response()->json([$updatenName]);

}
public function save_rate(Request $request){

    $save_rate = DB::table('ratting')->insert([
            'user_id'=>(int)$request->user_id,
            'user_id_r'=>(int)$request->user_id_r,
            'value' =>$request->value
        ]);

        return response()->json([ $save_rate ]);

}

public function get_rate($id){

    $PostData = DB::table('ratting as r')
                    ->join('users as u', 'u.id', '=', 'r.user_id')
                    ->where('u.id','=', $id)
                    ->select('r.id as r_id', 'r.average', 'u.name', 'u.phone' ,'u.last_name', 'u.image as u_image', 'u.job')
                    ->get();

        $data = array(
            'PostData'=> $PostData
            );
        
    return response()->json([ $data ]);

}

public function count_rate(Request $request){

    $user_id = $request->user_id;
    $user_id_r = $request->user_id_r;

    $PostData = DB::SELECT("SELECT count('*') AS r_count
                 FROM ratting WHERE user_id='".$user_id."' AND user_id_r='".$user_id_r."'");


        $data = array('PostData' =>$PostData);


        return response()->json([$data]);

}

public function get_rated_user(Request $request){

    $user_id = $request->user_id;
    $user_id_r = $request->user_id_r;

    $count = DB::table('ratting')->where('user_id_r', '=', $user_id_r)->count('user_id');
    $sum = DB::table('ratting')->where('user_id_r', '=', $user_id_r)->sum('value');

    $average = $sum/$count;


    $PostData = DB::SELECT("SELECT  value,id as r_id, IFNULL(id,0) as status, count('*') AS r_count
                 FROM ratting WHERE user_id='".$user_id."' AND user_id_r='".$user_id_r."' GROUP BY value, status, r_id");


        $data = array('PostData' =>$PostData, 'average'=>$average, 'count'=>$count);


        return response()->json([$data]);

}

public function update_rate(Request $request){

         $update = DB::table("ratting")
                    ->where('id','=',$request->id)
                    ->update(['value'=>$request->value]);

    return response()->json([ $update ]);

}

public function count_post($id){

    $PostData = DB::SELECT("SELECT count('id') AS p_count
                 FROM post as p LEFT JOIN users as u ON u.id=p.user_id WHERE  user_id='".$id."' ");


        $data = array('PostData' =>$PostData);


        return response()->json([$data]);

}

public function favoriteInsert(Request $request){
    
        $register = DB::table('favorite')->insert([
            'user_id'=>$request->user_id,
            'p_id' =>$request->p_id,
            'status'=>'t'
        ]);

}

public function favoriteDelete($id){
    $delete = DB::table('favorite')->where('id','=',$id)->delete();
    return response()->json([$delete]);
}

  public function getFavoritedPosts($id){

$PostData = DB::SELECT("SELECT u.name,u.id as u_id,u.last_name,u.image,u.phone, pr.pName,u.job ,cat.Cname, p.*, IFNULL(f.id,0) as status, f.id as f_id
 FROM post as p LEFT JOIN favorite as f ON p.id=f.p_id
 INNER JOIN users as u ON u.id=p.user_id INNER JOIN province as pr ON pr.id=p.province_id INNER JOIN category as cat ON cat.id=p.cat_id where f.status='t' AND f.user_id='".$id."' GROUP BY p.id, u.id, p.user_id, p.cat_id, p.province_id, p.title, p.text, p.image, p.adress, u.name, u.last_name, u.image, u.phone, pr.pName, u.job, cat.Cname, f.id");



        $data = array(
            'PostData'=> $PostData
            
        );

    return response()->json([ $data ]);

    } 


////////////////////////
    public function getPostsToEdit($id){


$PostData = DB::SELECT("SELECT u.name,u.id as u_id,u.last_name,u.image,u.phone, pr.pName,u.job ,cat.Cname, p.*, IFNULL(f.id,0) as status, f.id as f_id
 FROM post as p LEFT JOIN favorite as f ON p.id=f.p_id
 INNER JOIN users as u ON u.id=p.user_id INNER JOIN province as pr ON pr.id=p.province_id INNER JOIN category as cat ON cat.id=p.cat_id WHERE p.id = '".$id."' GROUP BY p.id, u.id, p.user_id, p.cat_id, p.province_id, p.title, p.text, p.image, p.adress, u.name, u.last_name, u.image, u.phone, pr.pName, u.job, cat.Cname, f.id");

        $data = array(
            'PostData'=> $PostData
            
        );

    return response()->json([ $data ]);

    } 
   
   public function EditPosts(Request $request){
        $pic = $request->file('image')->store("images"); 

        $post = DB::table('post')->where('id','=',$request->p_id)
        ->update(
            [
                'user_id'=>(int)$request->user_id,
                'cat_id'=>(int)$request->cat_id,
                'province_id'=>(int)$request->province_id,
                'title'=>$request->title,
                'text'=>$request->text,
                'adress'=>$request->adress,
                'image'=>$pic
            ]
        );

        return response()->json([ $post ]);
    }


    public function delete_posts($id){
    $delete = DB::table("post")->Where('id', '=', $id)->delete();
    return response()->json([ $delete ]);
}

 public function reportUsers(Request $request){
    
        $post = DB::table('report')->insert(
            [
                'user_report'=>(int)$request->user_report,
                'user_reported'=>(int)$request->user_reported,
                'type'=>"u",
                'detail'=>$request->detail
            ]
        );

        return response()->json([ $post ]);
    }

     public function reportPosts(Request $request){
    
        $post = DB::table('report')->insert(
            [
                'user_report'=>(int)$request->user_report,
                'p_id'=>(int)$request->p_id,
                'type'=>"p",
                'detail'=>$request->detail
            ]
        );

        return response()->json([ $post ]);
    }

    public function deleteUserAccount($id){
    $delete = DB::table("users")->Where('id', '=', $id)->delete();
    return response()->json([ $delete ]);
}



 public function getPasswords(Request $request){

if ( $user = Auth::attempt(['phone' =>  $request->phone, 'password' => $request->password])) {
        $data['auth'] = ['isSuccussfull'=> true, 'message'=>'Loged in',];
        }else{
            $data['auth'] = ['isSuccussfull'=> false, 'message'=>'رمز عبور اشتباه میباشد!',];
        }   
        return response()->json([ $data ]);
 }

 public function changePasswords(Request $request){
    $password = Hash::make($request->password);
    $id = $request->id;
    $change = DB::table('users')->where('id',$id)->update(['password'=>$password]);
     return response()->json([$change]);
 }

 public function TopUsers($id){


    $count = DB::table('ratting')->where('user_id_r', '=', $id)->count('user_id');
    $sum = DB::table('ratting')->where('user_id_r', '=', $id)->sum('value');

    $average = $sum/$count;

    $PostData = $average;
            

        $data = array(
            'PostData'=> $PostData
            
        );

        return response()->json([ $data ]);


 }

 
}
