<?php

namespace Modules\HinhThucDoi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\HinhThucDoi\Entities\HinhThucDoi;
use Illuminate\Routing\Controller;

class HinhThucDoiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hinhThucDois = HinhThucDoi::paginate(10); 
        // $emps->withPath(route('HinhThucDoi::HinhThucDoi.index'));
        $hinhThucDois->withPath(url('hinhthucdoi/index'));
        // $emps = HinhThucDoi::all();
        // return $emps;
        return view('hinhthucdoi::index', compact('hinhThucDois'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hinhthucdoi::create');
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
        if(HinhThucDoi::where('TenHinhThuc', $data['TenHinhThuc'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['TenHinhThuc']='Hình thức này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        
          // return $request->all();
        $hinhThucDoi = HinhThucDoi::create($data); 
        // return $p->id;
        return redirect()->route('hinhthucdoi.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hinhthucdoi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $hinhThucDoi = HinhThucDoi::findOrFail($id);
        return view('hinhthucdoi::edit', compact('hinhThucDoi'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $data = $request->all();
        $oldPosition = HinhThucDoi::findOrFail($data['id']);
        $msgErrors = [];
        if($oldPosition->macv != $data['TenHinhThuc']  && HinhThucDoi::where('TenHinhThuc', $data['TenHinhThuc'])->first()){
            $msgErrors['TenHinhThuc']='Hình thức này này đã tồn tại';
        }
        
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        $oldPosition->update($data);
        return redirect()->route('hinhthucdoi.index');

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
