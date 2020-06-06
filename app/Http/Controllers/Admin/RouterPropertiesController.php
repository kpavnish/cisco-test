<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RouterProperty;
use Illuminate\Http\Request;

class RouterPropertiesController extends Controller
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
            $routerproperties = RouterProperty::where('sapid', 'LIKE', "%$keyword%")
                ->orWhere('host_name', 'LIKE', "%$keyword%")
                ->orWhere('loop_back', 'LIKE', "%$keyword%")
                ->orWhere('mac_address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $routerproperties = RouterProperty::latest()->paginate($perPage);
        }

        return view('admin.router-properties.index', compact('routerproperties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.router-properties.create');
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
        $request->validate([
    'sapid' => 'required|max:18',
    'host_name' => 'required|max:14|url',
    'loop_back' => 'required|max:100',
    'mac_address' => 'required|max:17',
]);
        $requestData = $request->all();

        RouterProperty::create($requestData);

        return redirect('admin/router-properties')->with('flash_message', 'RouterProperty added!');
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
        $routerproperty = RouterProperty::findOrFail($id);

        return view('admin.router-properties.show', compact('routerproperty'));
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
        $routerproperty = RouterProperty::findOrFail($id);

        return view('admin.router-properties.edit', compact('routerproperty'));
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

        $requestData = $request->all();

        $routerproperty = RouterProperty::findOrFail($id);
        $routerproperty->update($requestData);

        return redirect('admin/router-properties')->with('flash_message', 'RouterProperty updated!');
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
        RouterProperty::destroy($id);

        return redirect('admin/router-properties')->with('flash_message', 'RouterProperty deleted!');
    }
}
