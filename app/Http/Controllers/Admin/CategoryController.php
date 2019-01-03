<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $category = Category::where('name', 'LIKE', "%$keyword%")
                ->orWhere('detall', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->paginate($perPage);
        }

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {            
        
        $this->validate($request, [
			'name' => 'required|unique:categories|max:191'
		]);
        $requestData = $request->all();
        
        Category::create($requestData);

        return redirect('category')->withSuccess('Category '. trans('app.success_store')); 

        } catch (Exception $e) {

            return redirect('category')->withWarning('Category '. trans('app.warning_store'));  

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
           
        $this->validate($request, [
			'name' => 'required|max:191|unique:categories,id,'.$id
		]);
        $requestData = $request->all();
        
        $category = Category::findOrFail($id);
        $category->update($requestData);

        return redirect('category')->withSuccess('Category '. trans('app.success_update')); 

        } catch (Exception $e) {

            return redirect('category')->withWarning('Category '. trans('app.warning_update'));   

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            
        Category::destroy($id);

        return redirect('category')->withSuccess('Category '. trans('app.success_destroy')); 

        } catch (Exception $e) {

            return redirect('category')->withWarning('Category '. trans('app.warning_destroy'));  

        }
    }
}
