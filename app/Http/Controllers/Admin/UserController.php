<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public $crud;
    
    function index(){
        $this->crud = app('crud');
        $this->crud->title = mb_ucfirst('profile');

        return view('backend.page.user-profile', [
            'crud' => $this->crud,
            'user' => Auth::user(),
        ]);
    }

    function update(Request $request){
        $rule = [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'email' => 'required|email',
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
        ];

        $errors = [];

        $user = Auth::user();

        if(($request->old_password != null) 
            || ($request->new_password != null)
            || ($request->confirm_password != null)){

                $rule = [
                    'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                    'email' => 'required|email',
                    'username' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'nullable',
                    'old_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password|min:6',
                ];
                // $2y$10$haQD4acPNE.eTaqMC/rWxOV0d1nGuX4y51zObfLRiB2iY.rmcOIIW
                if(!Hash::check($request->input('old_password'), $user->password)){
                    $errors['old_password'] = "Old password is not same with in your data";
                } 
        }

        $validator = Validator::make($request->all(), $rule);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())
            ->withInput();
        }
        
        if(count($errors) > 0){
            return redirect()->back()
            ->withErrors($errors)
            ->withInput();
        }

        $image = $request->image;

        DB::beginTransaction();
        try{
            $user = User::where('id', $user->id)->first();
            if($image != null){
                // image upload
                $filenameWithExt = $image->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/permalink',$fileNameToStore1);
                $product_image_1 = $fileNameToStore1;
                $image = $product_image_1;
                $user->image = $image;
            }

            $user->name = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->new_password);
            $user->save();

            DB::commit();
            flash()->addSuccess('Your profile has been updated.');
            return redirect('admin/profile');
        }catch(\Exception $e){
            DB::rollBack();
            flash()->addErrors($e->getMessage());
            return redirect()->back()->withInput();
        }

    }
}
