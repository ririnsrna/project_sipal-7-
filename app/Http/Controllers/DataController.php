<?php

namespace App\Http\Controllers;

use App\alat_model;
use App\users_model;
use App\member_model;
use App\kategori_model;
use App\peminjaman_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function user(Request $request)
    {
        if ($request->has('search')) {
            $member = member_model::where(function ($query) {
                $search = request('search');
                $query->where('nama_member', 'LIKE', '%' . $search . '%');
            })->paginate('7');
        } else {
            $member = member_model::paginate('7');
        }
        return view('data_user', ['var_member' => $member]);
    }

    // Bagian Karyawan
    public function karyawan(Request $request)
    {
        if ($request->has('search')) {
            $users = users_model::where(function ($query) {
                $search = request('search');
                $query->where('name', 'LIKE', '%' . $search . '%');
            })->paginate('7');
        } else {
            $users = users_model::paginate('7');
        }
        return view('data_karyawan', ['var_user' => $users]);
    }
    public function kategori_alat(Request $request)
    {
        if ($request->has('search')) {
            $kategori = kategori_model::where(function ($query) {
                $search = request('search');
                $query->where('nama_kategori', 'LIKE', '%' . $search . '%');
            })->paginate('7');
        } else {
            $kategori = kategori_model::paginate('7');
        }
        return view('kategori_alat', ['var_kategori' => $kategori]);
    }
    public function alat()
    {
        $kategori = kategori_model::all();
        return view('alat', ['var_kategori' => $kategori]);
    }
    public function data_alat($id, Request $request)
    {
        if ($request->has('search')) {
            $alat = alat_model::where(function ($query) {
                $search = request('search');
                $query->where('nama_barang', 'LIKE', '%' . $search . '%');
            })->where('id_kategori', $id)->paginate('7');
        } else {
            $alat = alat_model::where('id_kategori', $id)->paginate('7');
        }
        $kategori = kategori_model::where('id_kategori', $id)->first();
        return view('detail_alat', ['var_alat' => $alat, 'var_id' => $id, 'var_kategori' => $kategori]);
    }
    public function peminjaman_alat(Request $request)
    {
        $var_member = member_model::all();
        $var_alat = alat_model::all();

        if ($request->has('search')) {
            $peminjaman = peminjaman_model::with('user', 'alat', 'member')->whereHas('member', function ($query) {
                $search = request('search');
                $query->where('nama_member', 'LIKE', '%' . $search . '%');
            })->paginate('7');
        } else {
            $peminjaman = peminjaman_model::with('user', 'alat', 'member')->paginate('7');
        }
        return view('peminjaman_alat', ['var_peminjaman' => $peminjaman, 'var_member' => $var_member, 'var_alat' => $var_alat]);
    }
    public function info()
    {
        return view('info');
    }

    public function insert_member(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'alamat' => 'required|max:300',
            'kelas' => 'required|max:300',
            'no_telp' => 'required|max:15',
            'tgl_lahir' => 'required|date_format:Y-m-d'
        ], [
            'name.required' => 'Nama mohon diisi!',
            'alamat.required' => 'Alamat mohon diisi!',
            'kelas.required' => 'Kelas mohon diisi!',
            'no_telp.required' => 'Nomer telpon mohon diisi!',
            'tgl_lahir.required' => 'Tanggal lahir mohon diisi!'
        ]);
        if ($v) {
            $mb = new member_model();
            $mb->nama_member = $req["name"];
            $mb->alamat = $req["alamat"];
            $mb->kelas = $req["kelas"];
            $mb->no_telp = $req["no_telp"];
            $mb->tgl_lahir = $req["tgl_lahir"];
            $mb->save();
            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
            return redirect('/user');
        }
    }
    public function edit_member($id)
    {
        $member = member_model::where('id_member', $id)->first();
        return view('/edit_member', ['var_member' => $member]);
    }
    public function proses_edit_member(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'alamat' => 'required|max:300',
            'kelas' => 'required|max:300',
            'no_telp' => 'required|max:15',
            'tgl_lahir' => 'required|date_format:Y-m-d'
        ], [
            'name.required' => 'Nama mohon diisi!',
            'alamat.required' => 'Alamat mohon diisi!',
            'kelas.required' => 'Kelas mohon diisi!',
            'no_telp.required' => 'Nomer telpon mohon diisi!',
            'tgl_lahir.required' => 'Tanggal lahir mohon diisi!'
        ]);
        if ($v) {
            $member = member_model::where('id_member', $req['id'])->update(['nama_member' => $req["name"], 'alamat' => $req["alamat"], 'kelas' => $req['kelas'], 'no_telp' => $req["no_telp"], 'tgl_lahir' => $req["tgl_lahir"]]);

            if ($member) {
                session()->flash('berhasil', 'Data Berhasil Diubah');
                return redirect('/user');
            } else {
                session()->flash('gagal', 'Data Gagal Diubah');
                return redirect('/ubah_member/' . $req["id"]);
            }
        }
    }
    public function hapus_member($id)
    {
        $member = member_model::where("id_member", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Berhasil Dihapus');
        return redirect('/user');
    }

    public function insert_kategori(Request $req)
    {

        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'deskripsi' => 'required|max:300',
        ]);
        if ($v) {
            $kategori = new kategori_model();
            $kategori->nama_kategori = $req['name'];
            $kategori->deskripsi = $req['deskripsi'];
            $kategori->created_by = Auth::user()->name;
            $kategori->save();
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/kategori_alat');
        }
    }
    public function edit_kategori($id)
    {
        $kategori = kategori_model::where('id_kategori', $id)->first();
        return view('/edit_kategori', ['var_kategori' => $kategori]);
    }
    public function proses_edit_kategori(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'deskripsi' => 'required|max:300',
        ], [
            'name.required' => 'Nama mohon diisi!',
            'deskripsi.required' => 'Deskripsi mohon diisi!'
        ]);
        if ($v) {
            $kategori = kategori_model::where('id_kategori', $req['id'])->update(['nama_kategori' => $req["name"], 'deskripsi' => $req["deskripsi"]]);
            if ($kategori) {
                session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                return redirect('/kategori_alat');
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_kategori/' . $req["id"]);
            }
        }
    }
    public function hapus_kategori($id)
    {
        $member = kategori_model::where("id_kategori", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/kategori_alat');
    }

    public function insert_alat(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:300',
            'merk' => 'required|max:300',
            'jumlah' => 'required|max:10'

        ]);
        if ($v) {
            $alat = new alat_model();
            $alat->id_kategori = $req['id'];
            $alat->nama_barang = $req['name'];
            $alat->merk = $req['merk'];
            $alat->jumlah_alat = $req['jumlah'];
            $alat->created_by = Auth::user()->name;
            $alat->save();
            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
            return redirect('/detail_alat/' . $req["id"]);
        }
    }
    public function edit_alat($id)
    {
        $alat = alat_model::where('id', $id)->first();
        $kategori = kategori_model::all();
        return view("/edit_alat", ['var_alat' => $alat, 'var_kategori' => $kategori]);
    }
    public function proses_edit_alat(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:300',
            'kategori' => 'required',
            'merk' => 'required|max:300',
            'jumlah_alat' => 'required|max:300',
        ]);
        if ($v) {
            $kategori = alat_model::where('id', $req['id'])->update(['id_kategori' => $req['kategori'], 'nama_barang' => $req["name"], 'merk' => $req["merk"], 'created_by' => Auth::user()->name, 'jumlah_alat' => $req["jumlah_alat"]]);
            if ($kategori) {
                session()->flash('berhasil', 'Data Berhasil Diubah');
                return redirect("/detail_alat/$req->id_kategori");
            } else {
                session()->flash('gagal', 'Data Gagal Diubah');
                return redirect('/detail_alat/ubah_alat/' . $req["id"]);
            }
        }
    }
    public function hapus_alat($id)
    {
        $member = alat_model::where("id", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
    public function insert_peminjaman(Request $req)
    {
        $v = $this->validate($req, [
            'member'  => 'required',
            'alat' => 'required',
        ]);
        if ($v) {
            $peminjaman = new peminjaman_model();
            $peminjaman->id_member = $req['member'];
            $peminjaman->id_alat = $req['alat'];
            $peminjaman->id = $req['penginput'];
            $peminjaman->keadaan = 'Belum Dikembalikan';
            $peminjaman->save();

            $jml_alat = DB::table('alat')->where('id', '=', $req['alat'])->select('jumlah_alat')->get();
            $total = $jml_alat[0]->jumlah_alat - 1;
            // dd($total);
            $alat = alat_model::where('id', $req['alat'])->update(['jumlah_alat' => $total]);
            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
            return redirect('/peminjaman_alat');
        }
    }
    public function ubah_status($id)
    {
        $data = DB::table('peminjaman')->where('id_peminjaman', '=', $id)->select(DB::raw('datediff(updated_at,created_at) as total'))->get();
        if ($data[0]->total > 7) {
            $denda = 25000;
            $administrasi = 5000;
            $total = $denda + $administrasi;
        } else {
            $denda = 0;
            $administrasi = 5000;
            $total = $denda + $administrasi;
        }
        $peminjaman = peminjaman_model::where("id_peminjaman", $id)->update(['lama' => $data[0]->total, 'keadaan' => "Sudah Dikembalikan", 'updated_by' => Auth::user()->name, 'denda' => $denda, 'administrasi' => $administrasi, 'total_biaya' => $total]);
        // Total Buku
        $jmlh = DB::table('peminjaman')
            ->where([['peminjaman.id_peminjaman', '=', $id]])
            ->join('alat', 'peminjaman.id_alat', '=', 'alat.id')
            ->select('alat.*')->first();
        $total = $jmlh->jumlah_alat + 1;
        $alat = alat_model::where("id", $jmlh->id)->update(['jumlah_alat' => $total]);
        if ($peminjaman && $alat) {
            session()->flash('berhasil', 'Data Berhasil Diubah');
            return redirect('/peminjaman_alat');
        } else {
            session()->flash('gagal', 'Data Gagal Diubah');
            return redirect('/peminjaman_alat');
        }
    }
    public function hapus_peminjaman($id)
    {
        $member = peminjaman_model::where("id_peminjaman", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Berhasil Dihapus');
        return redirect('/peminjaman_alat');
    }

    public function ubah_user()
    {
        return view('edit_user');
    }
    public function proses_edit_user(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required',
            'email' => 'required',
        ]);


        if ($req->password) {
            $password = Hash::make($req->password);
        } else {
            $password = Auth::user()->password;
        }

        if ($v) {
            $member = users_model::where('id', Auth::user()->id)->update(['name' => $req["name"], 'email' => $req["email"], 'password' => $password]);
        }

        if ($member) {
            session()->flash('berhasil', 'Data Berhasil Diubah');
            return redirect('/home');
        }
    }

    public function tambahalat()
    {
        return view('tambah_alat');
    }
    public function tambahdata()
    {
        return view('layouts.tambah_user');
    }
    public function insert_new_detail(Request $request, $id)
    {
        $id = $id;
        return view('tambah_detail', compact('id'));
    }
}
