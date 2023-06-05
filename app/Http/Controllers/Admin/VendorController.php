<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;

class VendorController extends AdminController
{

    function setup(){
        $this->crud->set_url('vendor');
        $this->crud->set_model(Vendor::class);
        $this->crud->set_title(mb_ucfirst('vendor'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('name', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'image_profile',
            'label' => 'Image Profile',
            'type' => 'image',
        ]);

        $this->crud->add_column([
            'name' => 'service',
            'label' => 'Service',
            'type' => 'text',
            'search' => function($value, $query){
                return $query->OrWhere('service', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'province',
            'label' => 'Province',
            'type' => 'text',
            'orderable' => true,
            // 'search' => function($value, $query){
            //     return $query->where('province', 'LIKE', '%'.$value.'%');
            // }
        ]);

        $this->crud->add_column([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text',
            'orderable' => true,
            // 'search' => function($value, $query){
            //     return $query->where('city', 'LIKE', '%'.$value.'%');
            // }
        ]);

        $this->crud->add_column([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->OrWhere('address', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->OrWhere('email', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->OrWhere('phone', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'rate',
            'label' => 'Rating',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'sm_instagram',
            'label' => 'Instagram',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'sm_whatsapp',
            'label' => 'Whatsapp',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'sm_facebook',
            'label' => 'Facebook',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'sm_twitter',
            'label' => 'Twitter',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'youtube_url_1',
            'label' => 'Youtube URL 1',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'youtube_url_2',
            'label' => 'Youtube URL 2',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'youtube_url_3',
            'label' => 'Youtube URL 3',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'youtube_url_4',
            'label' => 'Youtube URL 4',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'function',
            'orderable' => true,
            'function' => function($item){
                if($item->status == 1){
                    return '<span class="badge bg-success">Active</span>';
                }
                return '<span class="badge bg-danger">Inactive</span>';
            }
        ]);

        // Add rule validation for create & update

        // $this->crud->deny_access('info');
        // $this->crud->deny_access('update');
        // $this->crud->deny_access('delete');
    }

    
    function search(Request $request){
        // $this->crud->model = $this->crud->model->where('name', 'LIKE', '%kat%');
        return parent::search($request);
    }

    function rule($id = null){
        if($id){
            return [
                'name' => 'required|unique:vendors,name,'.$id,
                'image_profile' => 'mimes:jpeg,jpg,png,gif|max:10000',
                'province' => 'required',
                'city' => 'required',
                'address' => 'required',
            ];
        }
        return [
            'name' => 'required|unique:vendors,name',
            'image_profile' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'image_banner' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.vendor');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.vendor', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $request = request();
        $request->request->remove('_token');
        $name = $request->name;
        $service = $request->service;
        $email = $request->email;
        $phone = $request->phone;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;
        $rate = $request->rate;
        $sm_instagram = $request->sm_instagram;
        $sm_whatsapp = $request->sm_whatsapp;
        $sm_facebook = $request->sm_facebook;
        $sm_twitter = $request->sm_twitter;
        $youtube_url_1 = $request->youtube_url_1;
        $youtube_url_2 = $request->youtube_url_2;
        $youtube_url_3 = $request->youtube_url_3;
        $youtube_url_4 = $request->youtube_url_4;

        $description = $request->description;
        $image_banner = $request->image_banner;
        $image_profile = $request->image_profile;
        $status = $request->status;

        $this->get_validator($this->rule($id), $request->all());

        $req = $request->all();

        DB::beginTransaction();
        try{
            // image banner upload
            if($image_banner != null){
                $filenameWithExt = $image_banner->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image_banner->getClientOriginalExtension();
                // Filename to store
                $fileNameToStoreBanner = $filename.'_'.time().'.'.$extension;
                $path = $image_banner->storeAs('public/images/permalink',$fileNameToStoreBanner);
                // remove array key for image banner path
                unset($req['image_banner']);

                $req['image_banner'] = $fileNameToStoreBanner;
            }else{
                unset($req['image_banner']);
            }

            // image profile upload
            if($image_profile != null){
                $filenameWithExt = $image_profile->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image_profile->getClientOriginalExtension();
                // Filename to store
                $fileNameToStoreProfile = $filename.'_'.time().'.'.$extension;
                $path = $image_profile->storeAs('public/images/permalink',$fileNameToStoreProfile);

                unset($req['image_profile']);

                $req['image_profile'] = $fileNameToStoreProfile;
            }else{
                unset($req['image_profile']);
            }

            parent::update($id, $req);
            DB::commit();
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    function store(Request $request){
        $name = $request->name;
        $service = $request->service;
        $email = $request->email;
        $phone = $request->phone;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;
        $rate = $request->rate;
        $sm_instagram = $request->sm_instagram;
        $sm_whatsapp = $request->sm_whatsapp;
        $sm_facebook = $request->sm_facebook;
        $sm_twitter = $request->sm_twitter;
        $youtube_url_1 = $request->youtube_url_1;
        $youtube_url_2 = $request->youtube_url_2;
        $youtube_url_3 = $request->youtube_url_3;
        $youtube_url_4 = $request->youtube_url_4;

        $description = $request->description;
        $image_banner = $request->image_banner;
        $image_profile = $request->image_profile;
        $status = $request->status;

        $this->get_validator($this->rule(), $request->all());

        DB::beginTransaction();
        try{
            // image banner upload
            if($image_banner != null){
                    $filenameWithExt = $image_banner->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $image_banner->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStoreBanner = $filename.'_'.time().'.'.$extension;
                    $path = $image_banner->storeAs('public/images/permalink',$fileNameToStoreBanner);
            }else{
                    $fileNameToStoreBanner = 'default-banner.jpg';
            }

        // image profile vendor upload
        if($image_profile != null){
                $filenameWithExt = $image_profile->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image_profile->getClientOriginalExtension();
                // Filename to store
                $fileNameToStoreVendor = $filename.'_'.time().'.'.$extension;
                $path = $image_profile->storeAs('public/images/permalink',$fileNameToStoreVendor);
        }else{
                $fileNameToStoreVendor = 'default-vendor.jpg';
        }

            $vendor = new Vendor;
            $vendor->name = $name;
            $vendor->image_profile = $fileNameToStoreVendor;
            $vendor->image_banner = $fileNameToStoreBanner;
            $vendor->service = $service;
            $vendor->description = $description;
            $vendor->province = $province;
            $vendor->city = $city;
            $vendor->address = $address;
            $vendor->email = $email;
            $vendor->phone = $phone;
            $vendor->rate = $rate;
            $vendor->sm_instagram = $sm_instagram;
            $vendor->sm_whatsapp = $sm_whatsapp;
            $vendor->sm_facebook = $sm_facebook;
            $vendor->sm_twitter = $sm_twitter;
            $vendor->youtube_url_1 = $youtube_url_1;
            $vendor->youtube_url_2 = $youtube_url_2;
            $vendor->youtube_url_3 = $youtube_url_3;
            $vendor->youtube_url_4 = $youtube_url_4;
            $vendor->status = $status;
            $vendor->save();

            DB::commit();
            flash()->addSuccess('Your vendor has been submitted.');
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                return redirect()->back()->withInput();
        }

    }

    public function destroy($id)
    {   
        DB::beginTransaction();
        try {
            $delete = parent::destroy($id);
            DB::commit();
            return $delete;
        }catch(\Exception $e){
            DB::rollBack();
            return false;
        }
    }

}
