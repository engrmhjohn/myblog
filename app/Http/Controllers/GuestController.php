<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home(){
        return view('blog.guest.home',[
            'g_blogs'=>Guest::where('status',0)->orderBy('id','desc')->take(3)->get(),
            'g_recents'=>Guest::where('status',0)->orderBy('id','desc')->take(10)->get()
        ]);
    }
    public function saveGBlog(Request $request){
        $this->validate($request,[
            'g_blog_title'=>'required|unique:guests,g_blog_title|string|min:4|max:100',
            'g_author_name'=>'required:guests,g_author_name|string|min:4|max:30',
            'g_blog_category'=>'required:guests,g_blog_category|string|min:4|max:30',
            'g_blog_description'=>'required:guests,g_blog_description|string|min:200|max:5000',
            'g_blog_image'=>'required:guests,g_blog_image'
        ]);
        $g_blog= new Guest();
        $g_blog->g_blog_title = $request->g_blog_title;
        $g_blog->g_slug = $this->makeGSlug($request);
        $g_blog->g_author_name = $request->g_author_name;
        $g_blog->g_blog_category = $request->g_blog_category;
        $g_blog->g_blog_description = $request->g_blog_description;
        $g_blog->g_blog_image = $this->saveImage($request);
        $g_blog->save();
        return redirect('guest#g_response')->with('message','Thanks! Your Blog is submitted but need admin approval, keep patience!!');
    }
    private function makeGSlug($request)
    {
        $str = strtolower($request->g_blog_title);
        return preg_replace('/\s+/u','-',trim($str));
    }
    private function saveImage($request){
        $g_blog_image=$request->file('g_blog_image');
        $imageName=rand().'.'.$g_blog_image->getClientOriginalExtension();
        $directory = 'adminAsset/guest-blog-image/';
        $imgUrl=$directory.$imageName;
        $g_blog_image->move($directory,$imageName);
        return $imgUrl;
    }
    public function manageBlog(){
        return view('admin.guest.guest-manage-blog',[
            'g_blogs'=>Guest::all()
        ]);
    }
    public function statusG($id){
        $g_blog = Guest::find($id);
        if ($g_blog->status==0){
            $g_blog->status=2;
            $g_blog->save();
            return back();
        }else{
            $g_blog->status=0;
            $g_blog->save();
            return back();
        }
    }
    public function deleteGBlog(Request $request){
        $g_blog=Guest::find($request->g_blog_id);
        if($g_blog->g_blog_image){
            unlink($g_blog->g_blog_image);
        }
        $g_blog->delete();
        return back()->with('message','Blog Information Deleted Successfully');
    }
    public function editGBlog($id){
        $g_blog = Guest::find($id);
        return view('admin.guest.guest-edit-blog',[
            'g_blog'=>$g_blog
        ]);
    }
    public function updateGBlog(Request $request){

        $g_blog=Guest::find($request->g_blog_id);
        $g_blog->g_blog_title = $request->g_blog_title;
        $g_blog->g_slug = $this->makeGSlug($request);
        $g_blog->g_author_name = $request->g_author_name;
        $g_blog->g_blog_category = $request->g_blog_category;
        $g_blog->g_blog_description = $request->g_blog_description;
        if($request->file('g_blog_image')){
            if($g_blog->g_blog_image){
                unlink($g_blog->g_blog_image);
            }
            $g_blog->g_blog_image = $this->saveImage($request);
        }
        $g_blog->save();
        return redirect('guest-manage-blog')->with('message','Blog Information Updated Successfully');
    }
}
