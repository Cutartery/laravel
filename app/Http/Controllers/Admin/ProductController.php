<?php

namespace App\Http\Controllers\Admin;
use Images;
use File;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\classify;
use App\Models\Admin\bran_ify;
use App\Models\Admin\sku;
use App\Models\Admin\attribute;
use App\Models\Admin\image;
use Intervention\Image\ImageManager;
use Storage;


class ProductController extends Controller
{
    

    //添加商品页面显示
    public function picture_add(){

        $classify = new classify;
        $data = $classify->picture_add();
        // dd($data);
        return view('admin.index.picture_add',['data' => $data]);
    }
    //商品添加分类ajax
    public function ajaxpicture_add(Request $req){
        // dd($req->all());
        $classify = new classify;
        $data = $classify->ajaxpicture_add($req);
        // dd($data);
        return $data;
    }
    //商品添加品牌ajax
    public function ajaxbrpicture_add(Request $req){
        // dd($req->all());
        $bran_ify = new bran_ify;
        $data = $bran_ify->ajaxbrpicture_add($req);
        // dd($data);
        return $data;
    }

    public function dopicture_add(Request $req)//处理添加数据
    {
        // dd($req->all());
        $data = $req->all();
        $goods = [];
        foreach($data as $k => $v){
            $str = explode("-",$k);
            if(isset($str[1])){
                if($str[0]=="pro_title"){
                    $goods['title'][$str[1]] = $v;
                }
                if($str[0]=="pro_name"){
                    $goods['name'][$str[1]] = $v;
                }
                if($str[0]=="sku_stock"){
                    $goods['stock'][$str[1]] = $v;
                }
                if($str[0]=="sku_price"){
                    $goods['price'][$str[1]] = $v;
                }
                if($str[0]=="attr_attr"){
                    $goods['attr'][$str[1]] = $v;
                }
                if($str[0]=="attr_val"){
                    $goods['val'][$str[1]] = $v;
                }
                if($str[0]=="image"){
                    $goods['img'][$str[1]] = $v;
                    foreach($_FILES[$k]['name'] as $imgv){
                        $goods['imgName'][$str[1]][] =  $imgv;
                    }
                    
                }
            }
        }
        // dd($goods);
        $product = new Product;
        $product->fill($req->all());
        $product->save();
        $pro_id = $product->id;


        $date = date("Ymd");
        $path = "./uploads/thumbnail/$date";
        if (!file_exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        foreach($goods['stock'] as $k => $v){
            $sku = sku::create([
                'pro_id'=>$pro_id,
                'sku_stock'=>$v,
                'sku_price'=>$goods['price'][$k],
                'name'=>$goods['name'][$k],
                'title'=>$goods['title'][$k]
            ]);
            $sku_id = $sku->id;
            // dd($sku_id);
            foreach($goods['attr'][$k] as $k2 => $v2){
                $attr = attribute::create([
                    'sku_id' => $sku_id,
                    'attr_attr' => $v2,
                    'attr_val' => $goods['val'][$k][$k2],
                ]);
            }
            // dd($goods);
            if(isset($goods['img'][$k])){
                foreach($goods['img'][$k] as $k3 => $v3){

                    $imagepath = $v3->path();
                    $img = Images::make($imagepath);

                    $sm_path = 'thumbnail/'.$date.'/sm_'.md5(time()).$goods['imgName'][$k][$k3];
                    $img->resize(80,80);
                    $img->save('./uploads/'.$sm_path);

                    $md_path = 'thumbnail/'.$date.'/md_'.md5(time()).$goods['imgName'][$k][$k3];
                    $img->resize(250,250);
                    $img->save('./uploads/'.$md_path);
        
                    $bg_path = 'thumbnail/'.$date.'/bg_'.md5(time()).$goods['imgName'][$k][$k3];
                    $img->resize(400,400);
                    $img->save('./uploads/'.$bg_path);

                    $sp_path = 'thumbnail/'.$date.'/sp_'.md5(time()).$goods['imgName'][$k][$k3];
                    $img->resize(800,800);
                    $img->save('./uploads/'.$sp_path);

                    $image = image::create([
                        'sku_id' => $sku_id,
                        'sp_image' => $sp_path,
                        'bg_image' => $bg_path,
                        'md_image' => $md_path,
                        'sm_image' => $sm_path,
                    ]);
                }
            }
        }
 
        if($image == true)
        {
            return redirect()->route('Products_List');
        }
    }
    //添加完显示页面
    public function Products_List()
    {

        return view('admin.product.products_List');
    }
    //产品删除
    public function delproducts_List(Request $req)
    {
 
    }
    //产品批量删除
    public function delproducts_Lists(Request $req)
    {

    }
    //产品添加传输数据
    public function member_add($id)
    {

        return view('admin.product.member_add');
    }
    //产品添加
    public function domember_add(Request $req)
    {

    }
 







    //向页面传数据分类添加
    public function product_category_add()
    {
        $data = classify::get();
        foreach($data as $k => $v)
        {
            if(count(explode('-',$v->ify_path))>=4){
                unset($data[$k]);
            }
        }
        return view('admin.product.product_category_add',
            ['data' => $data]
        );
    }
    //向数据库保存分类添加
    public function doproduct_category_add(Request $req)
    {
        $classify = new classify;
        $ify = $req->all();
        if($ify['ify_pid']==0)
        {
            $ify['ify_path'] = '-';
        }
        else
        {
            $res = classify::where('id',$ify['ify_pid'])->first();
            $ify['ify_path'] = $res->ify_path.$ify['ify_pid'].'-';
        }
        $classify->fill($ify);
        $aa = $classify->save();
        if($aa == true)
        {
            return redirect()->route('product_category_index');
        }
    }
    //修改分类页面
    public function product_category_insert($id)
    {
        $data = classify::where('id',$id)->first();
        if($data->ify_pid == 0)
        {
            $data->ify_pid = $data->id;
        }
        $awsc = classify::where('id',$data->ify_pid)->first();
        // dd($awsc);
       return view('admin.product.product_category_insert',[
            'data' => $data,
            'awsc' => $awsc,
       ]);
    }
    //执行修改分类页面
    public function doproduct_category_insert(Request $req)
    {
        // dd($req->all());
       $aa = classify::where('id',$req->id)->update(['ify_name' => $req->ify_name]);
    //    dd($aa);
       if($aa==true)
       {
           return redirect()->route('product_category_index')->with('errors','234');
       }
       else
       {
           return back();
       }

    }
    //分类主页面
    public function product_category_index()
    {
        $classify = new classify;
        $data = $classify->doproduct_category_index();
        return view('admin.product.product_category_index',
        ['data' => $data]);
    }
    //分类主页删除ajax
    public function doproduct_category_index(Request $req)
    {
        classify::where('id',$req->id)->delete();
        classify::where('ify_pid',$req->id)->delete();
        classify::where('ify_path','like','%-'.$req->id.'-%')->delete();
    }






    //品牌添加
    public function Add_Brand()
    {
        $classify = new classify;
        $data = $classify->doproduct_category_index();

        return view('admin.product.Add_Brand',['data' => $data]);
    }

    //品牌添加处理
    public function doAdd_Brand(Request $req)
    {
        // dd($req->all());
        $brand = new Brand;
        $brand->fill($req->all());
        
        if($req->hasFile('brand_logo') && $req->file('brand_logo')->isValid()){
            $brand->brand_logo ='/upload/'.$req->brand_logo->store('brand/'.date('Ymd'));
        }
        $brand->save();
        $b_id = $brand->id;
        if(!isset($req->die))
        {
            die('请选择分类');
        }
        foreach($req->die as $v){
            $bran_ify = new bran_ify;

            $bran_ify->brand_id = $b_id;
            $bran_ify->ify_id = $v;

           $aa = $bran_ify->save();
        }
        if($aa == true)
        {
            return redirect()->route('Brand_Manage');
        }
    }
    //品牌首页
    public function Brand_Manage(){
        $data = Brand::get();

        return view('admin.product.Brand_Manage',
            ['data'=>$data]
        );
    }
    //向修改页面传输数据
    public function Add_Brand_update($id)
    {
        $classify = new classify;
        $asdf = $classify->doproduct_category_index();
        $data = Brand::where('id',$id)->first();
        $type = bran_ify::Add_Brand_update($id);
        $arr = [];

        foreach($type as $v){
            $arr[] = $v->id;
        }

        return view('admin.product.Add_Brand_update',
        [
            'asdf' => $asdf,
            'data' => $data,
            'type' => $arr
        ]);
    }
    //执行品牌修改
    public function doAdd_Brand_update(Request $req,$id)
    {
        $brand = new Brand;
        $brand->fill($req->all());
        $arr = [];
        if(isset($req->brand_logo))
        {
            $cc = Storage::disk('lms')->delete($req->logo);
            $brand->brand_logo ='/upload/'.$req->brand_logo->store('brand/'.date('Ymd'));
            $arr = [
                'brand_logo' => $brand->brand_logo,
            ];
        }
        $arr += [
            'brand_name' => $req->brand_name,
            'brand_content' =>$req->brand_content,
        ];
        Brand::where('id',$id)->update($arr);
        bran_ify::where('brand_id',$id)->delete();
        foreach($req->die as $v)
        {
           $aa = bran_ify::insert([
                'brand_id' => $id,
                'ify_id' => $v
            ]);
        }
        if($aa==true)
        {
            return redirect()->route('Brand_Manage')->with('errors','345');
        }
        else
        {
            return back();
        }
    }
    public function delAdd_Brand_update(Request $req)
    {
        // dd($req->all());
       $logo = brand::where('id',$req->id)->first();
        Storage::disk('lms')->delete($logo->brand_logo);
        Brand::where('id',$req->id)->delete();
        bran_ify::where('brand_id',$req->id)->delete();
    }
    public function Category_Manage(){
        return view('admin.product.Category_Manage');
    }
    public function Brand_detailed()
    {
        return view('admin.product.Brand_detailed');
    }
    public function member_show()
    {
        return view('admin.product.member_show');
    }

}
