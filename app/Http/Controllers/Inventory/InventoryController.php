<?php

namespace App\Http\Controllers\Inventory;

//use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Str;
use DB;
use PDF;
use Response;


class InventoryController extends Controller
{

    public function index()
    {
        //$blogs = Bolgs::all();
        //return view('blogs.blog', ['blogs' => $blogs]);
    }

    //brand
    public function brand()
    {
        return view('frontend.inventory.brand');
    }

    //addBrand
    public function addBrand(){
        return view('frontend.inventory.brand_add');
    }

    //editBrand
    public function editBrand($id){
        $brand = DB::table('brand')->where('id', $id)->first();
        return view('frontend.inventory.brand_edit',
        [
               'brand'=>$brand 
        ]);
    }

    //addEditBrandProcess
    public function addEditBrandProcess(Request $request){
        if ($request->method() == 'POST') {
            
            $id = $request->id;
            $brand_name = $request->brand_name;
            $brand_description = $request->brand_description;
            $brand_status = $request->brand_status;
            
            
            if( Auth::guard('frontpharmacy')->user() ){
                $phparmacy_id = Auth::guard('frontpharmacy')->user()->id;
            }else{
                $phparmacy_id = 0;
            }
            
            if($id == ''){
                //add Brand
                    $brand_data = [
                        'name'=>$brand_name,
                        'slug'=>Str::slug($brand_name),
                        'description'=>$brand_description,
                        'pharmacy_id' =>$phparmacy_id,
                        'status'=>$brand_status,
                    ];    
                    //echo '<pre>';
                    //print_r($brand_data);
                    //die;
                    DB::table('brand')->insert($brand_data);

                    Session::flash('message', 'Brand Added Successfully!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('frontpharmacy/inventory/brand');

                }else{
                //edit Brand
                $brand_data = [
                    'name'=>$brand_name,
                    'slug'=>Str::slug($brand_name),
                    'description'=>$brand_description,
                    'pharmacy_id' =>$phparmacy_id,
                    'status'=>$brand_status,
                ];    
                DB::table('brand')->where('id', $id)->update($brand_data);

                Session::flash('message', 'Brand Updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect('frontpharmacy/inventory/brand');
            }
        }
    }

    //category
    public function category()
    {
        return view('frontend.inventory.category');
    }

    //addCategory
    public function addCategory(){
        return view('frontend.inventory.category_add');
    }

    //editCategory
    public function editCategory($id){
        $category = DB::table('category')->where('id', $id)->first();
        return view('frontend.inventory.category_edit',
        [
               'category'=>$category 
        ]);
    }

    //addEditCategoryProcess
    public function addEditCategoryProcess(Request $request){
        if ($request->method() == 'POST') {
            
            $id = $request->id;
            $category_parent = $request->category_parent;
            $category_name = $request->category_name;
            $category_description = $request->category_description;
            $category_status = $request->category_status;
            
            
            if( Auth::guard('frontpharmacy')->user() ){
                $phparmacy_id = Auth::guard('frontpharmacy')->user()->id;
            }else{
                $phparmacy_id = 0;
            }
            
            if($id == ''){
                //add Category
                    $category_data = [
                        'parent_id' => $category_parent,
                        'name'=>$category_name,
                        'slug'=>Str::slug($category_name),
                        'description'=>$category_description,
                        'pharmacy_id' =>$phparmacy_id,
                        'status'=>$category_status,
                    ];    
                    DB::table('category')->insert($category_data);

                    Session::flash('message', 'Category Added Successfully!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('frontpharmacy/inventory/category');

                }else{
                //edit Category
                $category_data = [
                    'parent_id' => $category_parent,
                    'name'=>$category_name,
                    'slug'=>Str::slug($category_name),
                    'description'=>$category_description,
                    'pharmacy_id' =>$phparmacy_id,
                    'status'=>$category_status,
                ];    
                DB::table('category')->where('id', $id)->update($category_data);

                Session::flash('message', 'Category Updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect('frontpharmacy/inventory/category');
            }
        }
    }


    //product
    public function product()    {
        return view('frontend.inventory.product');
    }


    //addProduct
    public function addProduct(){
        return view('frontend.inventory.product_add');
    }

    //editProduct
    public function editProduct($id){
        $product = DB::table('product')->where('id', $id)->first();
        return view('frontend.inventory.product_edit',
        [
               'product'=>$product 
        ]);
    }

    //addEditProductProcess
    public function addEditProductProcess(Request $request){
        if ($request->method() == 'POST') {
            
            $id = $request->id;
            $product_name = $request->product_name;
            $product_price = $request->product_price;
            $product_quantity = $request->product_quantity;
            $product_description = $request->product_description;
            $product_status = $request->product_status;
            $product_cat = $request->product_cat;
            $product_brand = $request->product_brand;

            $product_cat_arr = explode('_', $product_cat);
            
            
            if( Auth::guard('frontpharmacy')->user() ){
                $phparmacy_id = Auth::guard('frontpharmacy')->user()->id;
            }else{
                $phparmacy_id = 0;
            }
            
            if($id == ''){
                //add Product
                    $product_data = [
                        'name'=>$product_name,
                        'slug'=>Str::slug($product_name),
                        'brand_id'=>$product_brand,
                        'main_cat'=>$product_cat_arr[0],
                        'sub_cat'=>$product_cat_arr[1],
                        'description'=>$product_description,
                        'pharmacy_id' =>$phparmacy_id,
                        'status'=>$product_status,
                    ];    
                    //echo '<pre>';
                    //print_r($product_data);
                    //die;
                    DB::table('product')->insert($product_data);

                    Session::flash('message', 'Product Added Successfully!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('frontpharmacy/inventory/product');

                }else{
                //edit Product
                $product_data = [
                    'name'=>$product_name,
                    'slug'=>Str::slug($product_name),
                    'brand_id'=>$product_brand,
                    'main_cat'=>$product_cat_arr[0],
                    'sub_cat'=>$product_cat_arr[1],
                    'price'=>$product_price,
                    'quantity'=>$product_quantity,
                    'description'=>$product_description,
                    'pharmacy_id' =>$phparmacy_id,
                    'status'=>$product_status,
                ];    
                DB::table('product')->where('id', $id)->update($product_data);

                Session::flash('message', 'Product Updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect('frontpharmacy/inventory/product');
            }
        }
    }
    

    //makeOrder
    public function makeOrder(Request $request, $id)
    {
        $order_id = $id;
        $orderExist = DB::table('order_pharmacies as op')
                        ->join('patients as p', 'op.patient_id', 'p.id')    
                        ->where('op.order_id', $order_id)->get();
        if($orderExist->count() > 0){
            $order_data = $orderExist->first();
        }else{
            $order_data = false;
        }

        return view('frontend.inventory.make_order', ['order_data'=>$order_data]);
    }

    //getProductData
    public function getProductData(Request $request){
       if($request->method() == 'POST'){
            //echo '<pre>';
            //print_r($request->all());
            $product_id = $request->product_id;
            $productExist = DB::table('product')->where('id', $product_id)->get();
            if($productExist->count() > 0){
                $product_data = $productExist->first();
                $status = true;
            }else{
                $product_data = false;
                $status = false;
            }
        }else{
            $product_data = false;
            $status = false;
        }
        echo json_encode(['status'=>$status, 'product_data'=>$product_data]);
    }

    
//searchProduct
public function searchProduct(Request $request){
    $s_key = $request->input('product_search'); 

    //get data from doctors table
    $doctors = DB::table('doctors')->where('doctor_fullname', 'like', '%'.$s_key.'%')->get();
    $doctors = DB::table('doctors')->where(DB::raw('lower(doctor_fullname)'), 'like', '%'.strtolower($s_key).'%')->get();

    //get data from hospitals table
    //$hospitals = DB::table('hospitals')->where('hospital_name', 'like', '%'.$s_key.'%')->get();
    $hospitals = DB::table('hospitals')->where(DB::raw('lower(hospital_name)'), 'like', '%'.strtolower($s_key).'%')->get();

    //->where(DB::raw('lower(name)'), strtolower("Hardik"))
    //get data from hakeems table
    //$hakeems = DB::table('hakeems')->where('hakeem_fullname', 'like', '%'.$s_key.'%')->get();
    $hakeems = DB::table('hakeems')->where(DB::raw('lower(hakeem_fullname)'), 'like', '%'.strtolower($s_key).'%')->get();

    $output = array();
    if($doctors->count() > 0 || $hospitals->count() > 0 || $hakeems->count() > 0){

        if($doctors->count() > 0)
        {
            foreach($doctors as $row)
            {
                $temp_array = array();
                $temp_array['value'] = 'DOCTOR >>'.$row->doctor_fullname;
                //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                $temp_array['label'] = 'DOCTOR >>'.$row->doctor_fullname;
                $output[] = $temp_array;
            }
        }


        if($hospitals->count() > 0)
        {
            foreach($hospitals as $row)
            {
                $temp_array = array();
                $temp_array['value'] = 'HOSPITAL >>'.$row->hospital_name;
                //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                $temp_array['label'] = 'HOSPITAL >>'.$row->hospital_name;
                $output[] = $temp_array;
            }
        }

        if($hakeems->count() > 0)
        {
            foreach($hakeems as $row)
            {
                $temp_array = array();
                $temp_array['value'] = 'HAKEEM >>'.$row->hakeem_fullname;
                //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                $temp_array['label'] = 'HAKEEM >>'.$row->hakeem_fullname;
                $output[] = $temp_array;
            }
        }
    }                
    else
    {
     $output['value'] = '';
     $output['label'] = 'No Record Found =>';
     //$output['label'] = 'No Record Found =>'.$doctors->count().' - '.$hospitals->count().' - '.$hakeems->count();
    }
   
    echo json_encode($output);
    //echo json_encode($doctors);
}
    


}//end of class InventoryController
