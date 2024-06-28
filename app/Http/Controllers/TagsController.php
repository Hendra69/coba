<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagsController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get tags
        $posts = tags::latest()->paginate(5);

        //render view with tags
        return view('tags.index', compact('posts'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required',
            'quantity'   => 'required',
             'purchasing_price'     => 'required',
            'selling_price'   => 'required',
        ]);

     

        //create post
        tags::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'purchasing_price' => $request->purchasing_price,
            'selling_price' => $request->selling_price,
        ]);

        //redirect to index
        return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(tags $post)
    {
        return view('tags.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, tags $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/tags', $image->hashName());

            //delete old image
            Storage::delete('public/tags/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/tags/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('tags.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
