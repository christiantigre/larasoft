<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Permission;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:permissions.create')->only(['create','store']);
        $this->middleware('permission:permissions.index')->only('index');
        $this->middleware('permission:permissions.edit')->only(['edit','update']);
        $this->middleware('permission:permissions.show')->only('show');
        $this->middleware('permission:permissions.destroy')->only(['delete']);
    }
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
            $permission = Permission::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $permission = Permission::latest()->paginate($perPage);
        }

        return view('admin.permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.permission.create');
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
			'name' => 'required|max:191',
			'slug' => 'required|unique:permissions|max:191'
		]);
        $requestData = $request->all();
        
        Permission::create($requestData);

        return redirect('permissions')->withSuccess('Permission '. trans('app.success_store')); 

        } catch (\Exception $e) {

            return redirect('permissions')->withWarning('Permission '. trans('app.warning_store'));  

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
        $permission = Permission::findOrFail($id);

        return view('admin.permission.show', compact('permission'));
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
        $permission = Permission::findOrFail($id);

        return view('admin.permission.edit', compact('permission'));
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
			'name' => 'required|max:191',
			'slug' => 'required|max:191|unique:permissions,id,'.$id
		]);
        $requestData = $request->all();
        
        $permission = Permission::findOrFail($id);
        $permission->update($requestData);

        return redirect('permissions')->withSuccess('Permission '. trans('app.success_update')); 

        } catch (\Exception $e) {
            // $e->getMessage() Guardar en el log
            return redirect('permissions')->withWarning('Permission '. trans('app.warning_update'));   

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
            
        Permission::destroy($id);

        return redirect('permissions')->withSuccess('Permission '. trans('app.success_destroy')); 

        } catch (\Exception $e) {

            return redirect('permissions')->withWarning('Permission '. trans('app.warning_destroy'));  

        }
    }
}
