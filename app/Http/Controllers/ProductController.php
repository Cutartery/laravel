<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\classify;
use Storage;


class ProductController extends Controller
{
    //添加完显示页面
    public function Products_List()
    {
        $product = new Product;
        $data = $product->doproducts_List();
        return view('product.products_List',
        ['data' => $data]);
    }
    //产品删除
    public function delproducts_List(Request $req)
    {
       return Product::where('id',$req->id)->delete();
    }
    //产品批量删除
    public function delproducts_Lists(Request $req)
    {
       $aa = Product::del_goods($req->die);
       return redirect()->route('Products_List');
    }
    //产品添加传输数据
    public function member_add($id)
    {
        $product = new Product;
        $data = $product->member_add($id);
        return view('product.member_add',
        ['data' => $data]);
    }
    //产品添加
    public function domember_add(Request $req)
    {
        // dd($req->all());
        $product = new Product;
        $product->fill($req->all());
        $arr = [];
        // 如果没有修改图片
        if(isset($req->file)){
             // 删除原有图片
             Storage::disk('lms')->delete($req->img);
            $product->file ='/upload/'.$req->file->store('product/'.date('Ymd'));
            
            $arr = ['file' => $product->file];
        }
        $arr += [
            "img_title" => $req->img_title,
            "titles" => $req->titles,
            "number" => $req->number,
            "place" => $req->place,
            "material" => $req->material,
            "brand" => $req->brand,
            "height" => $req->height,
            "zprice" => $req->zprice,
            "sprice" => $req->sprice,
            "keyword" => $req->keyword,
            "content" => $req->content,
        ];
        $aa = Product::where('id','=',$req->id)->update($arr);
        if($aa==true)
        {
            return redirect()->route('Products_List')->with('errors','123');
        }
        else
        {
            return back();
        }
    }
    public function Brand_Manage(){
        return view('product.Brand_Manage');
    }
    public function Category_Manage(){
        return view('product.Category_Manage');
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
        return view('product.product_category_add',
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
    //修改页面
    public function product_category_insert($id)
    {
        $data = classify::where('id',$id)->first();
        $awsc = classify::get();
        foreach($awsc as $k => $v)
        {
            if(count(explode('-',$v->ify_path))>=4){
                unset($awsc[$k]);
            }
        }
       return view('product.product_category_insert',[
            'data' => $data,
            'awsc' => $awsc,
       ]);
    }
    //执行修改页面
    public function doproduct_category_insert(Request $req)
    {
        dd($req->all());
        classify::where('id',$req->id)->update(['ify_name' => $req->ify_name]);

    }
    //分类主页面
    public function product_category_index()
    {
        $classify = new classify;
        $data = $classify->doproduct_category_index();
        return view('product.product_category_index',
        ['data' => $data]
        );
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
        return view('product.Add_Brand');
    }
    //品牌添加处理
    public function doAdd_Brand(Request $req)
    {
        // dd($req->all());
        $brand = new Brand;
        $brand->fill($req->all());
        if($req->hasFile('file') && $req->file('file')->isValid()){
            $brand->file ='/upload/'.$req->file->store('brand/'.date('Ymd'));
        }
        $aa = $brand->save();
        if($aa == true)
        {
            return redirect()->route('Category_Manage');
        }
    }
    public function Brand_detailed()
    {
        return view('product.Brand_detailed');
    }
    public function member_show()
    {
        return view('product.member_show');
    }
    //添加商品页面显示
    public function picture_add(){
        return view('index.picture_add');
    }
    public function dopicture_add(Request $req)//页面传来数据
    {
        $product = new Product;
        $product->fill($req->all());
        // dd($req->all());
        if($req->hasFile('file') && $req->file('file')->isValid()){
            $product->file ='/upload/'.$req->file->store('product/'.date('Ymd'));
        }
        $aa = $product->save();
        if($aa == true)
        {
            return redirect()->route('Products_List');
        }
    }
}