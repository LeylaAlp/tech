@extends('yonetim.layouts.master')
@section('title','Kategori Yönetimi')

@section('content')

    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">


                    @if(session()->has('mesaj'))
                        <div class="alert alert-{{ session('mesaj_tur') }} alert-dismissible fade show save"
                             role="alert">
                            <strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                                {{ session('mesaj') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Kategori {{ $entry->id >0 ? 'Güncelle' : 'Kayıt' }} </strong> Formu
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('yonetim.kategori.kaydet',$entry->id) }}" method="post"
                                      enctype="multipart/form-data" class="form-horizontal">
                                    @csrf


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Üst Kategori</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="ust_id" id="select" class="form-control">
                                                <option value="">{{ $entry->ust_kategori->kategori_adi }}</option>
                                                @foreach($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Kategori Adı</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="email-input" name="kategori_adi"
                                                   value="{{ old('kategori_adi',$entry->kategori_adi) }}"
                                                   placeholder="Kategori Adı Giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slug</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden"  name="original_slug"
                                                   value="{{ old('slug',$entry->slug) }}">

                                            <input type="text" id="text-input" name="slug"
                                                   value="{{ old('slug',$entry->slug) }}"
                                                   placeholder="Slug Değeri Giriniz" class="form-control">
                                        </div>
                                    </div>


                                    <div class="card-footer">

                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> {{ $entry->id >0 ? 'Güncelle' : 'Kaydet'  }}
                                        </button>
                                    </div>


                                </form>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
