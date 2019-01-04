<?php

namespace Modules\NhanVien\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Storage;
use Modules\NhanVien\Entities\NhanVien;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // $url = route('nhanvien.index');
        // return $url;
        $emps = NhanVien::with(['phongban:id,tenphong', 'chucvu:id,tencv'])->paginate(10);
        // return $emps;
        // $emps = NhanVien::paginate(10); 
        // $emps->withPath(url('nhanvien/index'));
        // $emps = NhanVien::all();
        // return $emps;
        return view('nhanvien::index', ['emps'=> $emps]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('nhanvien::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     // 'title' => 'required|unique:posts|max:255',
        //     'MaNhanVien' => 'unique:nhanvien',
        //     'Email' => 'unique:nhanvien'
        // ]);
        // return $request->all();
        $data = $request->all();
        $msgErrors = [];
        if(NhanVien::where('Username', $data['Username'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['Username']='Tên đăng nhập này đã tồn tại';
        }
        if(NhanVien::where('MaNhanVien', $data['MaNhanVien'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['MaNhanVien']='Mã nhân viên này đã tồn tại';
        }
        if(NhanVien::where('Email', $data['Email'])->first()){
            $msgErrors['Email']='Email này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        
        $data['Password'] = Hash::make($data['Password']);
        if(isset($data['Avatar'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->Avatar->extension();
            $data['Avatar'] = $imgName;
            $path = $request->Avatar->storeAs('public/avatar', $imgName); //in Storage
            // Storage::putFile($imgName, $request->Avatar);

            // return $path;
        }else{
            $data['Avatar'] = 'default.png';
        }
        // return $request->all();
        $nv = NhanVien::create($data); 
        // return $p->id;
        return redirect()->route('nhanvien.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

        $emp = NhanVien::findOrFail($id);
        // return $emp;
        return view('nhanvien::show', compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $emp = NhanVien::findOrFail($id);

        return view('nhanvien::edit', compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        
        $data = $request->all();
        $oldEmp = NhanVien::findOrFail($data['id']);
        $msgErrors = [];
        // return $oldEmp->password;
        if($oldEmp->username != $data['Username'] && NhanVien::where('Username', $data['Username'])->first()){
            $msgErrors['Username']='Tên đăng nhập này đã tồn tại';
        }
        if($oldEmp->maNhanVien!= $data['MaNhanVien'] && NhanVien::where('MaNhanVien', $data['MaNhanVien'])->first()){
                // RETurn 'Trùng Ma NHAN VIEN';
            $msgErrors['MaNhanVien']='Mã nhân viên này đã tồn tại';
        }
        if($oldEmp->email!= $data['Email'] && NhanVien::where('Email', $data['Email'])->first()){
            $msgErrors['Email']='Email này đã tồn tại';
        }
        // return 'pass';
       if(count($msgErrors)) return redirect()->back()->withInput()->withErrors($msgErrors);
        
        if(isset($data['Avatar'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->Avatar->extension();
            $data['Avatar'] = $imgName;
            // Storage::putFile('spares', $file);
            $path = $request->Avatar->storeAs('public/avatar', $imgName); //in Storage

            //delete old file
            if($oldEmp->Avatar != 'default.png'){
                Storage::delete("public/avatar/".$oldEmp->img);
                // return 'deleted';
            }
            
        }else{
            $data['Avatar'] = $oldEmp->avatar;
        }
        $data['Password'] = empty($data['Password']) ? $oldEmp->password : Hash::make($data['Password']);
        $oldEmp->update($data);
        return redirect()->route('nhanvien.index');  
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
