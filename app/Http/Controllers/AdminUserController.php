<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;
class AdminUserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        
        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['name'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input["password"] = bcrypt( $request->password );
        User::create( $input );
        Session::put('create_user','User has been created successfully');


        return redirect('admin/users');
        // $user = new User;
        // $user->name      = $request->username;
        // $user->email     = $request->email;
        // $user->role_id   = $request->role_id;
        // $user->is_active = $request->is_active;
        // $user->password  = $request->password;
        // if($file = $request->file('file') ){
        //     $name = $file->getClientOriginalName();
        //     $file->move('images',$file);
        //     $photo = Photo::create(['file'=>$name]);
        //     $user->photo_id =  $photo->id;
        //     $user->save();
        //     return redirect('admin/users');
        // }
           
           
    }   


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $role = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        $user  = User::find($id);
        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::find($id);
            $user->photo_id = $photo->id;
        }
        $store = $request->all();
        $user->update($store);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $user = User::findOrFail($id);
       $user->delete();
       Session::flash('delete_user','User has been deleted successfully');
       return redirect( 'admin/users' );
    }
}
