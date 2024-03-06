@extends('layouts.main')
@section('container')
    
<div class="container-fluid  ">
      <div class="row justify-content-md-center">
        <div class="col-md-9 ">
            <div class="card px-5 py-3 mt-5 shadow">
               <h1 class="text-danger text-center mt-3 mb-4">Form Proposal PKM-K</h1>

                        <div class="nav nav-fill my-3">
                          <label class="nav-link shadow-sm step0    border ml-2 ">Cover</label>
                          <label class="nav-link shadow-sm step1   border ml-2 " >Pengesahan</label>
                          <label class="nav-link shadow-sm step2   border ml-2 " >BAB 1</label>
                        </div>
          
                <form action="{{ route('form.index') }}" method="post" class="employee-form">
                 @csrf
                <div class="form-section">
                    <label for="">Judul:</label>
                    <input type="text" class="form-control mb-3" name="judul" required>
                </div>
                <div class="form-section">
                    <h4>Ketua Pelaksanaan Kegiatan</h4>
                    <label for="">Nama Ketua:</label>
                    <input type="text" class="form-control mb-3" name="nama_ketua" required>
                    <label for="">NIM Ketua:</label>
                    <input type="text" class="form-control mb-3" name="nim_ketua" required>
                    <label for="">Jurusan Ketua:</label>
                    <input type="text" class="form-control mb-3" name="jurusan_ketua" required>
                    <label for="">Universitas Ketua:</label>
                    <input type="text" class="form-control mb-3" name="univ_ketua" required>
                    <label for="">Alamat Ketua:</label>
                    <input type="text" class="form-control mb-3" name="alamat_ketua" required>
                    <label for="">No. Telepon Ketua:</label>
                    <input type="text" class="form-control mb-3" name="hp_ketua" required>
                    <label for="">Email Ketua:</label>
                    <input type="text" class="form-control mb-3" name="email_ketua" required>

                    <h4>Anggota Pelaksana Kegiatan</h4>
                    <label for="">Jumlah Anggota:</label>
                    <input type="number" min="1" class="form-control mb-3" name="jml_anggota" required>

                    <h4>Dosen Pendamping</h4>
                    <label for="">Nama Dosen Pendamping:</label>
                    <input type="text" class="form-control mb-3" name="dosbing" required>
                    <label for="">NIDN:</label>
                    <input type="text" class="form-control mb-3" name="nidn" required>
                    <label for="">Alamat Dosen:</label>
                    <input type="text" class="form-control mb-3" name="alamat_dosen" required>
                    <label for="">No. Telepon Dosen:</label>
                    <input type="text" class="form-control mb-3" name="hp_dosen" required>

                    <h4>Biaya Kegiatan Total</h4>
                    <label for="">Kemenristekdikti:</label>
                    <input type="text" class="form-control mb-3" name="dikti" required>
                    <label for="">Sumber Lain:</label>
                    <input type="text" class="form-control mb-3" name="sumber_lain" required>

                    <h4>Jangka Waktu Pelaksanaan</h4>
                    <label for="">Jangka Waktu Pelaksanaan:</label>
                    <input type="number" min="1" class="form-control mb-3" name="waktu_kerja" required>

                    <h4>Kota dan Tanggal</h4>
                    <label for="">Kota:</label>
                    <input type="text" class="form-control mb-3" name="kota" required>
                    <label for="">Tanggal:</label>
                    <input type="date" class="form-control mb-3" name="tanggal" required>
                </div>
                <div class="form-section">
                    <label for="">Latar Belakang:</label>
                    <textarea name="latbel" class="form-control mb-3" required></textarea>
                </div>
              <div class="form-navigation mt-3">
                 <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
                 <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                 <button type="submit" class="btn btn-success float-right">Submit</button>
              </div>

            </form>
        </div>
            
        </div>
      </div>
    </div>




<script>

    $(function(){
        var $sections=$('.form-section');

        function navigateTo(index){

            $sections.removeClass('current').eq(index).addClass('current');

            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [Type=submit]').toggle(atTheEnd);

     
            const step= document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";



        }

        function curIndex(){

            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });

        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });

        });

        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);
        });


        navigateTo(0);



    });


</script>

@endsection