<?php

namespace Modules\ChucVu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ChucVu\Entities\ChucVu;
use Illuminate\Routing\Controller;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $positions = ChucVu::paginate(10); 
        // $emps->withPath(route('ChucVu::ChucVu.index'));
        $positions->withPath(url('chucvu/index'));
        // $emps = ChucVu::all();
        // return $emps;
        return view('chucvu::index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('chucvu::create');
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
        if(ChucVu::where('MaCV', $data['MaCV'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['MaCV']='Mã chức vụ này đã tồn tại';
        }
        if(ChucVu::where('TenCV', $data['TenCV'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['TenCV']='Tên chức vụ này đã tồn tại';
        }
        if(ChucVu::where('TenVietTat', $data['TenVietTat'])->first()){
            $msgErrors['TenVietTat']='Tên viết tắt này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        
          // return $request->all();
        $position = ChucVu::create($data); 
        // return $p->id;
        return redirect()->route('chucvu.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('chucvu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $position = ChucVu::findOrFail($id);
        return view('chucvu::edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->all();
        $oldPosition = ChucVu::findOrFail($data['id']);
        $msgErrors = [];
        if($oldPosition->macv != $data['MaCV']  && ChucVu::where('MaCV', $data['MaCV'])->first()){
            $msgErrors['MaCV']='Mã chức vụ này đã tồn tại';
        }
        if($oldPosition->tencv != $data['TenCV'] && ChucVu::where('TenCV', $data['TenCV'])->first()){
            $msgErrors['TenCV']='Tên chức vụ này đã tồn tại';
        }
        if($oldPosition->TenVietTat != $data['TenVietTat'] && ChucVu::where('TenVietTat', $data['TenVietTat'])->first()){
            $msgErrors['TenVietTat']='Tên viết tắt này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        $oldPosition->update($data);
        return redirect()->route('chucvu.index');

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
