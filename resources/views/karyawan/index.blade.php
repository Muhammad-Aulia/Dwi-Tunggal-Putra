@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h1 class="d-inline">Data Karyawan</h1>
<button class="btn btn-primary float-right"  data-toggle="collapse" data-target="#collapseCreateKaryawan">Tambah Karyawan</button>
<div class="row mt-3">
    <div class="col">
        <div class="collapse multi-collapse" id="collapseCreateKaryawan">
            <div class="card card-body">
            <form action="{{route('karyawan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <x-text-input name="nama" label="Nama " value="{{old('nama')}}" :required="true" />
            <x-text-input name="alamat" label="Alamat " value="{{old('alamat')}}" :required="false" />
            <x-text-input name="no_ktp" label="No Ktp " value="{{old('no_ktp')}}" :required="true" />

            <div class="lable"><h2>Pendidikan  </h2>
            <hr>
            <div id="group-tambah">    
                <div id="tambah">           
                    <div class="form-group">
                        <label for="title">Nama Sekolah/Universitas</label>
                        <input type="text" class="form-control" name="nama_sekolah[]" id="nama_sekolah" placeholder="Nama Sekolah" required>
                    </div>  
                    <div class="form-group">
                        <label for="title">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan[]" id="jurusan" placeholder="Juruan " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun Masuk</label>
                        <input type="text" class="form-control" name="tahun_masuk[]" id="tahun_masuk" placeholder="2010 " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun Lulus</label>
                        <input type="text" class="form-control" name="tahun_lulus[]" id="tahun_lulus" placeholder="2014 "required>
                    </div>
                </div>
            </div>  
            <button type="button" class="btn btn-light w-100 mb-4 tambah">Tambah Data Pendidikan</button>
            </div>

            <div class="lable"><h2>Pengalaman Kerja  </h2>
            <hr>
            <div id="group-tambah1">    
                <div id="tambah1">           
                    <div class="form-group">
                        <label for="title">Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan[]" id="perusahaan" placeholder="Perusahaan" required>
                    </div>  
                    <div class="form-group">
                        <label for="title">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan[]" id="jabatan" placeholder="Jabatan " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun </label>
                        <input type="text" class="form-control" name="tahun[]" id="tahun" placeholder="2020 " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Keterangan</label>
                        <textarea  class="form-control" name="keterangan[]" id="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    </div>

                </div>
            </div>  
            <button type="button" class="btn btn-light w-100 mb-4 tambah1">Tambah Data Pengalaman Kerja</button>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($create=="done")
    <div class="alert alert-success">
        <ul>
            <li>Berhasil menambahkan data</li>
        </ul>
    </div>
@endif
@if ($create=="fail")
    <div class="alert alert-danger">
        <ul>
            <li>Gagal menambahkan detail data</li>
        </ul>
    </div>
@endif
@if ($delete=="done")
    <div class="alert alert-success">
        <ul>
            <li>Berhasil menghapus data</li>
        </ul>
    </div>
@endif
@if ($delete=="fail")
    <div class="alert alert-danger">
        <ul>
            <li>Gagal menghapus detail data</li>
        </ul>
    </div>
@endif
@if ($update=="done")
    <div class="alert alert-success">
        <ul>
            <li>Berhasil memperbaharui data</li>
        </ul>
    </div>
@endif
@if ($update=="fail")
    <div class="alert alert-danger">
        <ul>
            <li>Gagal memperbaharui data</li>
        </ul>
    </div>
@endif
@stop



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col bg-white p-3 shadow">
            <table id="tableisi" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Ktp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $key=>$karyawan)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$karyawan->nama}}</td>
                        <td>{{$karyawan->alamat}}</td>
                        <td>{{$karyawan->no_ktp}}</td>
                        <td>

                        <button class="btn btn-info my-2 mr-1" type="button"   
                        data-karyawan="{{json_encode($karyawan)}}"
                        data-toggle="modal" data-backdrop="static" data-target="#ViewModal"><i class="fas fa-info"></i></button>

                        <button class="btn btn-primary my-2 mr-1" type="button"  
                        data-karyawan="{{json_encode($karyawan)}}" 
                        data-toggle="modal" data-backdrop="static" data-target="#modalEdit"><i class="fas fa-edit"></i></button>
                        
                        <button class="btn btn-danger my-2 ml-1" type="button" data-dataid="{{$karyawan->id}}"  data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i></button>
                
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Update -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Ubah detail data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEditData" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-text-input name="nama" label="Nama " value="{{old('nama')}}" :required="true" />
            <x-text-input name="alamat" label="Alamat " value="{{old('alamat')}}" :required="false" />
            <x-text-input name="no_ktp" label="No Ktp " value="{{old('no_ktp')}}" :required="true" />

            <div class="lable"><h2>Pendidikan  </h2>
            <hr>
            <div id="group-tambah2">    
                <div id="tambah2">           
                    <div class="form-group">
                        <label for="title">Nama Sekolah/Universitas</label>
                        <input type="text" class="form-control" name="nama_sekolah[]" id="nama_sekolah" placeholder="Nama Sekolah" required>
                    </div>  
                    <div class="form-group">
                        <label for="title">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan[]" id="jurusan" placeholder="Juruan " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun Masuk</label>
                        <input type="text" class="form-control" name="tahun_masuk[]" id="tahun_masuk" placeholder="2010 " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun Lulus</label>
                        <input type="text" class="form-control" name="tahun_lulus[]" id="tahun_lulus" placeholder="2014 "required>
                    </div>
                </div>
            </div>  
            <button type="button" class="btn btn-light w-100 mb-4 tambah2">Tambah Data Pendidikan</button>
            </div>

            <div class="lable"><h2>Pengalaman Kerja  </h2>
            <hr>
            <div id="group-tambah3">    
                <div id="tambah3">           
                    <div class="form-group">
                        <label for="title">Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan[]" id="perusahaan" placeholder="Perusahaan" required>
                    </div>  
                    <div class="form-group">
                        <label for="title">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan[]" id="jabatan" placeholder="Jabatan " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tahun </label>
                        <input type="text" class="form-control" name="tahun[]" id="tahun" placeholder="2020 " required>
                    </div>
                    <div class="form-group">
                        <label for="title">Keterangan</label>
                        <textarea  class="form-control" name="keterangan[]" id="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    </div>

                </div>
            </div>  
            <button type="button" class="btn btn-light w-100 mb-4 tambah3">Tambah Data Pengalaman Kerja</button>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDeleteLabel">Verifikasi hapus data karyawan ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <form method="post" id="formDeleteModal">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{--Modal View--}}
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ViewModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalDetailBody">
        <div class="nameUser" id="nameUser">
            
        </div>
            <h2>Pendidikan</h2>
        <div id="tableUser">
            <table id="tableViewUser" class="table table-hover mb-5">
                <thead>
                <tr>
                    <th>Nama Sekolah</th>
                    <th>Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                </tr>
                </thead>
                <tbody id="tablePendidikanKaryawan">

                </tbody>
            </table>
        </div>

            <h2>Pengalaman Kerja</h2>
        <div id="tableUser">
            <table id="tableViewUser" class="table table-hover mb-5">
                <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Tahun</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody id="tablePengalamanKaryawan">

                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    $(document).ready(function() {
    $('#tableisi').DataTable();
        $(".tambah").click(function(){
        $("#tambah").clone().appendTo("#group-tambah");
    });
        $(".tambah1").click(function(){
        $("#tambah1").clone().appendTo("#group-tambah1");
    });
        $(".tambah2").click(function(){
        $("#tambah2").clone().appendTo("#group-tambah2");
    });
        $(".tambah3").click(function(){
        $("#tambah3").clone().appendTo("#group-tambah3");
    });
    $('#modalDelete').on('show.bs.modal',function(e){
        var dataid = $(e.relatedTarget).data('dataid');
        $('#formDeleteModal').attr('action','/general/karyawan/'+dataid);
    });
    $('#modalEdit').on('show.bs.modal',function(e){
        var data = $(e.relatedTarget).data('karyawan');
        $('#formEditData').attr('action','/general/karyawan/'+data.id);
        $('#formEditData').find('#nama').val(data.nama);
        $('#formEditData').find('#alamat').val(data.alamat);
        $('#formEditData').find('#no_ktp').val(data.no_ktp);
        $('#formEditData').find('#coment').val(data.coment);

    });

    $('#ViewModal').on('show.bs.modal',function(e){
        var data = $(e.relatedTarget).data('karyawan');
        $('#nameUser').empty();
        $('#nameUser').append("Name  : "+data.nama+"<hr>");
        $('#nameUser').append("Alamat  : "+data.alamat+"<hr>");
        $('#nameUser').append("No KTP  : "+data.no_ktp+"<hr>");

        
        const namaSekolah = JSON.parse(data.nama_sekolah)
        const jurusan = JSON.parse(data.jurusan)
        const tahunMasuk = JSON.parse(data.tahun_masuk)
        const tahunLulus = JSON.parse(data.tahun_lulus)
        $('#tablePendidikanKaryawan').empty();
        namaSekolah.forEach(function(val1,a){
        $('#tablePendidikanKaryawan').append("<tr>");
        $('#tablePendidikanKaryawan').append("<td>"+val1+"</td>");
        $('#tablePendidikanKaryawan').append("<td>"+jurusan[a]+"</td>");
        $('#tablePendidikanKaryawan').append("<td>"+tahunMasuk[a]+"</td>");
        $('#tablePendidikanKaryawan').append("<td>"+tahunLulus[a]+"</td>");
        $('#tablePendidikanKaryawan').append("<tr>");
        });

        const perusahaan = JSON.parse(data.perusahaan)
        const jabatan = JSON.parse(data.jabatan)
        const tahun = JSON.parse(data.tahun)
        const keterangan = JSON.parse(data.keterangan)
        $('#tablePengalamanKaryawan').empty();
        perusahaan.forEach(function(val2,a){
        $('#tablePengalamanKaryawan').append("<tr>");
        $('#tablePengalamanKaryawan').append("<td>"+val2+"</td>");
        $('#tablePengalamanKaryawan').append("<td>"+jabatan[a]+"</td>");
        $('#tablePengalamanKaryawan').append("<td>"+tahun[a]+"</td>");
        $('#tablePengalamanKaryawan').append("<td>"+keterangan[a]+"</td>");
        $('#tablePengalamanKaryawan').append("<tr>");
        });

    });
    


    

    setTimeout(() => {
        $('.alert').fadeOut();
    }, 3000);
});
    </script>
@stop

@section('plugins.Datatables', true)

