<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class UserController extends Controller
{
    //đăng nhập
   public function getLogin()
   {
   	return view('user.login');
   }
   public function postLogin(Request $req)
   {
   	 $this->validate($req,
            [
                'email'=>'email',
                'password'=>'min:6',

            ],
            [
                'email'=>':attribute không đúng định dạng! ', 
                'min' =>':attribute ít nhất 6 ký tự ', 
            ]
        );

            $credentials = array('email' => $req->email,'password'=> $req->password);
            // dd($credentials);
            // dd(Auth::attempt($credentials));

            if(Auth::attempt($credentials))

            {
                return redirect()->route('list-user');
            }
            else{
               return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công !']);
           }  
   }

   //đăng ký 
   public function getRegister()
    {
      return view('user.register');
    }

    public function postRegister(Request $req)
    {
        $this->validate($req,[
            'email'=>'email|unique:users,email',
            'password'=>'min:6',
            'psw-repeat'=>'same:password'
          ],[   
              'email'=>'email Không đúng',     
              'min' => 'mật khẩu Không được nhỏ hơn :min',
              'unique' =>'email đã tồn tại',
              'same'   =>'mật khẩu nhập lại phải giống nhau!',
        ]);

       $User = new User();
       $User->name = $req->name;  
        $User->email = $req->email;     
        $User->password = Hash::make($req->password);
        $User->role=0;
        // dd($User);
        $User->save();

        return redirect()->back()->with(['flag'=>'success','message'=>'Đăng ký thành công
          !']);

    }

    //danh sách user
    public function getListUser()
    {
      $user =User::all();
      return view('user.index',compact('user'));
    }
    //add user
    public function getAddUser()
    {
      return view('user.addUser');
    }
     public function postAddUser(Request $req)
    {
       $this->validate($req,[
            'email'=>'email|unique:users,email',
            'password'=>'min:6',
            're_password'=>'same:password'
          ],[   
              'email'=>'định dạng email Không đúng',     
              'min' => 'mật khẩu Không được nhỏ hơn :min',
              'unique' =>'email đã tồn tại',
              'same'   =>'mật khẩu nhập lại không khớp !',
        ]);

       $User = new User();

        $User->name = $req->name;
        $User->email = $req->email;     
        $User->password = Hash::make($req->password);
        $User->role=$req->quyen;
        // dd($User);
        $User->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công !');
    }
    //sửa user
     public function getEditUser($id)
    {
        $user= User::find($id);
        return view('user.editUser',compact('user')); 
    }
    public function postEditUser($id,Request $req)
    {
       $User = User::find($id); 

        $User->role=$req->quyen;
        $User->save();

        return redirect()->back()->with('thanhcong','Cập nhật thành công !');

    }
    //xóa user
    public function getDeleteUser($id)
    {
      $xoa= User::find($id);
        $xoa->delete();
       return redirect()->back()->with('thongbao','Đã xóa thành công!');
    }
    //logout  
    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('user-login');
    }

}
