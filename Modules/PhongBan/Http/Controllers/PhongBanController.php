<?php

namespace Modules\PhongBan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\PhongBan\Entities\PhongBan;
use Illuminate\Routing\Controller;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $deps = PhongBan::paginate(2); 
        // $emps->withPath(route('PhongBan::PhongBan.index'));
        $deps->withPath(url('phongban/index'));
        // $emps = PhongBan::all();
        // return $emps;
        return view('phongban::index', compact('deps'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('phongban::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $msgErrors = [];
        if(PhongBan::where('MaPhong', $data['MaPhong'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['MaPhong']='Mã phòng ban này đã tồn tại';
        }
        if(PhongBan::where('TenPhong', $data['TenPhong'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['TenPhong']='Tên phòng ban này đã tồn tại';
        }
        if(PhongBan::where('TenVietTat', $data['TenVietTat'])->first()){
            $msgErrors['TenVietTat']='Tên viết tắt này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        
          // return $request->all();
        $dep = PhongBan::create($data); 
        // return $p->id;
        return redirect()->route('phongban.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('phongban::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $dep = PhongBan::findOrFail($id);
        return view('phongban::edit', compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->all();
        $oldDep = PhongBan::findOrFail($data['id']);
        $msgErrors = [];
        if($oldDep->MaPhong != $data['MaPhong']  && PhongBan::where('MaPhong', $data['MaPhong'])->first()){
            $msgErrors['MaPhong']='Mã phòng ban này đã tồn tại';
        }
        if($oldDep->TenPhong != $data['TenPhong'] && PhongBan::where('TenPhong', $data['TenPhong'])->first()){
            $msgErrors['TenPhong']='Tên phòng ban này đã tồn tại';
        }
        if($oldDep->TenVietTat != $data['TenVietTat'] && PhongBan::where('TenVietTat', $data['TenVietTat'])->first()){
            $msgErrors['TenVietTat']='Tên viết tắt này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        $oldDep->update($data);
        return redirect()->route('phongban.index');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        return $request;
    }
}
