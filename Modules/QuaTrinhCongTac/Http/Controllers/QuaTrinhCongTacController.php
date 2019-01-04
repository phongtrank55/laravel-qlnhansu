<?php

namespace Modules\QuaTrinhCongTac\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\DB;
use Storage;
use Modules\QuaTrinhCongTac\Entities\QuaTrinhCongTac;
use Modules\NhanVien\Entities\NhanVien;
use Modules\PhongBan\Entities\PhongBan;
use Modules\ChucVu\Entities\ChucVu;
use Modules\HinhThucDoi\Entities\HinhThucDoi;


class QuaTrinhCongTacController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $quaTrinhCongTacs = QuaTrinhCongTac::with(['phongban:id,tenphong', 'chucvu:id,tencv', 'nhanvien:id,manhanvien,ho,ten', 'hinhthucdoi:id,tenhinhthuc'])->paginate(10);
        // return $quaTrinhCongTacs;
        // $quaTrinhCongTacs = QuaTrinhCongTac::paginate(10); 
        // $quaTrinhCongTacs->withPath(url('quatrinhcongtac/index'));
        // $quaTrinhCongTacs = QuaTrinhCongTac::all();
        // return $quaTrinhCongTacs;
        return view('quatrinhcongtac::index', ['quaTrinhCongTacs'=> $quaTrinhCongTacs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // $categories = Category::pluck('title', 'id');
        $nhanviens = NhanVien::pluck('ten', 'id');

        // $nhanviens = DB::table('nhanvien')->select('ho,ten,id')->get();
        $nhanviens = NhanVien::select('ho', 'id', 'ten', 'manhanvien')->get();
        $hinhthucdois = HinhThucDoi::pluck('tenhinhthuc', 'id');
        $phongbans = PhongBan::pluck('tenphong', 'id');
        $chucvus = ChucVu::pluck('tencv', 'id');

        return view('quatrinhcongtac::create', compact('nhanviens', 'hinhthucdois', 'phongbans', 'chucvus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // return $data;
        // return NhanVien::UpdateDepartment($data['NhanVienId']);        
        // $msgErrors = [];
        // if(QuaTrinhCongTac::where('Username', $data['Username'])->first()){
        //         // RETurn 'Trùng Ma NHAN VIEN';
        //     $msgErrors['Username']='Tên đăng nhập này đã tồn tại';
        // }
        
        // return 'pass';
       // if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        // print_r(\DateTime::createFromFormat("d/m/Y", $data['NgayBatDau'])->); die;
        $data['NgayBatDau'] = \DateTime::createFromFormat("d/m/Y", $data['NgayBatDau'])->format('U');
        if($data['NgayKetThuc'])
            $data['NgayKetThuc'] = \DateTime::createFromFormat("d/m/Y", $data['NgayKetThuc'])->format('U');
        if(isset($data['FileDinhKem'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->FileDinhKem->extension();
            $data['FileDinhKem'] = $imgName;
            $path = $request->FileDinhKem->storeAs('public/quyetdinh', $imgName); //in Storage
            // Storage::putFile($imgName, $request->FileDinhKem);

            // return $path;
        }else{
            $data['FileDinhKem'] = '';
        }
        // return $request->all();
        $qtct = QuaTrinhCongTac::create($data); 
        // return $qtct;
        NhanVien::UpdateDepartment($data['NhanVienId']);

        // return $p->id;
        return redirect()->route('quatrinhcongtac.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

        // $quaTrinhCongTac = QuaTrinhCongTac::findOrFail($id);
        $quaTrinhCongTac = QuaTrinhCongTac::with(['phongban:id,tenphong', 'chucvu:id,tencv', 'nhanvien:id,manhanvien,ho,ten', 'hinhthucdoi:id,tenhinhthuc'])->findOrFail($id);
        // return $quaTrinhCongTac;
        return view('quatrinhcongtac::show', compact('quaTrinhCongTac'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $quaTrinhCongTac = QuaTrinhCongTac::findOrFail($id);
        $nhanviens = NhanVien::select('ho', 'id', 'ten', 'manhanvien')->get();
        $hinhthucdois = HinhThucDoi::pluck('tenhinhthuc', 'id');
        $phongbans = PhongBan::pluck('tenphong', 'id');
        $chucvus = ChucVu::pluck('tencv', 'id');


        return view('quatrinhcongtac::edit', compact('quaTrinhCongTac', 'nhanviens', 'hinhthucdois', 'phongbans', 'chucvus'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        
        $data = $request->all();
        $old = QuaTrinhCongTac::findOrFail($data['id']);
        // $msgErrors = [];
        // // return $old->password;
        // if($old->username != $data['Username'] && QuaTrinhCongTac::where('Username', $data['Username'])->first()){
        //     $msgErrors['Username']='Tên đăng nhập này đã tồn tại';
        // }
       // if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        $data['NgayBatDau'] = \DateTime::createFromFormat("d/m/Y", $data['NgayBatDau'])->format('U');
        if($data['NgayKetThuc'])
            $data['NgayKetThuc'] = \DateTime::createFromFormat("d/m/Y", $data['NgayKetThuc'])->format('U');
        if(isset($data['FileDinhKem'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->FileDinhKem->extension();
            $data['FileDinhKem'] = $imgName;
            $path = $request->FileDinhKem->storeAs('public/quyetdinh', $imgName); //in Storage
            // Storage::putFile($imgName, $request->FileDinhKem);

            // return $path;
        }else{
            $data['FileDinhKem'] = '';
        }
        $old->update($data);
        NhanVien::UpdateDepartment($data['NhanVienId']);        
        return redirect()->route('quatrinhcongtac.index');  
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $quaTrinhCongTac = QuaTrinhCongTac::findOrFail($request->id);
        $quaTrinhCongTac->delete();
        if($quaTrinhCongTac->filedinhkem){
            Storage::delete("public/quyetdinh/".$quaTrinhCongTac->filedinhkem);
            // return 'deleted';
        }
        NhanVien::UpdateDepartment($quaTrinhCongTac->nhanVienId);
        return redirect()->route('quatrinhcongtac.index');     
    }
}
