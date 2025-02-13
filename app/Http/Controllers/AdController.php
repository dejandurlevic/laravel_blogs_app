<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ad;



class AdController extends Controller
{
    //
    public function showAdForm(){
        $allCategories = Category::all();
        return view('ads.showAdForm', ["categories"=>$allCategories]);
    }


    public function showAdNewForm(Request $request){

        $request->validate(
            [
                 "title"=>"required | max:255",
                 "body"=>"required",
                 "price"=>"required",
                 "image1"=>"mimes:jpeg,jpg,png",
                 "image2"=>"mimes:jpeg,jpg,png",
                 "image3"=>"mimes:jpeg,jpg,png",
                 "category_id"=> "required"
            ]
            );

            if($request->hasFile('image1')){
                $image1 = $request->file('image1');
                $image1_name = time().'1.'.$image1->extension();
                $image1->move(public_path('ad_images'), $image1_name);
            }
            if($request->hasFile('image2')){
                $image2 = $request->file('image2');
                $image2_name = time().'2.'.$image2->extension();
                $image2->move(public_path('ad_images'), $image2_name);
            }
            if($request->hasFile('image3')){
                $image3 = $request->file('image3');
                $image3_name = time().'3.'.$image3->extension();
                $image3->move(public_path('ad_images'), $image3_name);
            }

            Ad::create([
                "title"=> $request->title,
                "body"=> $request->body,
                "price"=> $request->price,
                "image1"=> (isset($image1_name)) ? $image1_name : null, 
                "image2"=> (isset($image2_name)) ? $image2_name : null, 
                "image3"=> (isset($image3_name)) ? $image3_name : null, 
                "user_id"=> Auth::user()->id, 
                "category_id"=> $request->category_id
            ]);

            return redirect()->route('welcome')->with('success', 'Ad created successfully!');
        }

        public function showAllAds(){
            
            if(isset(request()->cat)){
            
                $allAds = Ad::whereHas('category', function($query){
                    $query->whereName(request()->cat);
                })->get();
            }else{
                $allAds = Ad::all();
            }
         
            return view('ads.showAllAds', ["allAds"=>$allAds]);
        }

        public function showSingleAd($id){

            $single_ad = Ad::with('category')->find($id);

            return view('ads.singleAd', ["singleAd"=>$single_ad]);
        }
        
}
