<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Guest;
use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use function Symfony\Component\Mime\Header\get;

class BlogController extends Controller
{
    public function blog(){
        return view('blog.home.home',[
            'blogs'=>Blog::where('status',1)->orderBy('id','desc')->take(3)->get(),
            'recents'=>Blog::where('status',1)->orderBy('id','desc')->take(10)->get()
        ]);
    }
//'blogs'=>Blog::orderBy('id','desc')->take(3)->get()
    public function addBlog(){
        return view('admin.blog.add-blog');
    }
    public function saveBlog(Request $request){
        $this->validate($request,[
            'blog_title'=>'required|unique:blogs,blog_title|string|min:4|max:100',
            'author'=>'required:blogs,author|string|min:4|max:30',
            'category'=>'required:blogs,category|string|min:4|max:30',
            'description'=>'required:blogs,description|string|min:200|max:30000',
            'image'=>'required:blogs,image'
        ]);
        $blog= new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->slug = $this->makeSlug($request);
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->description = $request->description;
        $blog->image = $this->saveImage($request);
        $blog->save();
        return redirect('manage-blog')->with('message','Successfully Blog Added');
    }

    private function makeSlug($request)
    {
        $str = strtolower($request->blog_title);
        return preg_replace('/\s+/u','-',trim($str));
    }
    private function saveImage($request){
        $image=$request->file('image');
        $imageName=rand().'.'.$image->getClientOriginalExtension();
        $directory = 'adminAsset/blog-image/';
        $imgUrl=$directory.$imageName;
        $image->move($directory,$imageName);
        return $imgUrl;
    }
    public function manageBlog(){
        return view('admin.blog.manage-blog',[
            'blogs'=>Blog::all()
        ]);
    }
    public function status($id){
        $blog = Blog::find($id);
        if ($blog->status==1){
            $blog->status=0;
            $blog->save();
            return back();
        }else{
            $blog->status=1;
            $blog->save();
            return back();
        }
    }
    public function deleteBlog(Request $request){
        $this->blog=Blog::find($request->blog_id);
        if($this->blog->image){
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return back()->with('message','Blog Information Deleted Successfully');
    }
    public function editBlog($id){
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog',[
            'blog'=>$blog
        ]);
    }
    public function updateblog(Request $request){

        $blog=Blog::find($request->blog_id);
        $blog->blog_title = $request->blog_title;
        $blog->slug = $this->makeSlug($request);
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->description = $request->description;
        if($request->file('image')){
            if($blog->image){
                unlink($blog->image);
            }
            $blog->image = $this->saveImage($request);
        }
        $blog->save();
        return redirect('manage-blog')->with('message','Blog Information Updated Successfully');
    }
    public function allBlog(){
        return view('blog.all-blogs.all-blogs',[
        'allblogs'=>Blog::where('status',1)->orderBy('id','desc')->paginate(9),
        'g_allblogs'=>Guest::where('status',0)->orderBy('id','desc')->paginate(9),
            ]);
    }
    public function blogDetails($slug){
        $blog= DB::table('blogs')
            ->select('blogs.*')
            ->where('slug',$slug)
            ->first();
        return view('blog.blog-details.blog-details',[
            'blog'=> $blog
        ]);
    }
    public function blogGDetails($g_slug){
        $g_blog= DB::table('guests')
            ->select('guests.*')
            ->where('g_slug',$g_slug)
            ->first();
        return view('blog.blog-details.g-blog-details',[
            'g_blog'=> $g_blog
        ]);
    }
    public function contactUs(){
        return view('blog.contact.contact-us');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create($request->all());
        return redirect('/contact-us')->with(['success' => 'Thanks! We will contact you shortly.']);
    }
    public function search(){
        $search_text = $_GET['search_query'];
        return view('blog.all-blogs.search-blogs',[
            'allblogs'=>Blog::where('blog_title','LIKE','%'.$search_text.'%')->paginate(18),
            'g_allblogs'=>Guest::where('g_blog_title','LIKE','%'.$search_text.'%')->paginate(18),
        ]);
    }
}
