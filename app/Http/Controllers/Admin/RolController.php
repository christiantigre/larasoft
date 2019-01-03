<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Rol;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RolController extends Controller
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
            $role = Role::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('special', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $role = Role::latest()->paginate($perPage);
        }

        return view('admin.rol.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.rol.create', compact('permissions'));
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
			'slug' => 'required|max:191'
		]);
        $requestData = $request->all();
        
        $rol = Role::updateOrCreate(
               ['name' => $requestData['name'], 'slug' => $requestData['slug'], 'description' => $requestData['description']],
               ['name' => $requestData['name']]
           );

        $rol->permissions()->sync($request->get('permissions'));

        return redirect('roles')->withSuccess('Rol '. trans('app.success_store')); 

        } catch (\Exception $e) {

            return redirect('roles')->withWarning('Rol '. trans('app.warning_store'));  

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('admin.rol.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {

        $permissions = Permission::get();

        return view('admin.rol.edit', compact('role','permissions'));
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
			'slug' => 'required|max:191'
		]);
        $rol = Role::findOrFail($id);
        $rol->update($request->all());

        $rol->permissions()->sync($request->get('permissions'));

        return redirect('roles')->withSuccess('Rol '. trans('app.success_update')); 

        } catch (\Exception $e) {

            return redirect('roles')->withWarning('Rol '. trans('app.warning_update'));   

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
            
        Role::destroy($id);

        return redirect('roles')->withSuccess('Rol '. trans('app.success_destroy')); 

        } catch (\Exception $e) {

            return redirect('roles')->withWarning('Rol '. trans('app.warning_destroy'));  

        }
    }
}
