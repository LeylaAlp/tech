@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')

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
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Kullanıcı {{ $entry->id >0 ? 'Güncelle' : 'Kayıt' }} </strong> Formu
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('yonetim.kullanici.kaydet',$entry->id) }}" method="post"
                                      enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ad Soyad</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="adsoyad"
                                                   value="{{ old('adsoyad',$entry->adsoyad) }}"
                                                   placeholder="Adınızı ve Soyadınızı Giriniz" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="email"
                                                   value="{{ old('email',$entry->email) }}" placeholder="Email Giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Şifre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password-input" name="sifre"
                                                   placeholder="Şifre Giriniz" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Adres</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="adres" id="textarea-input" rows="5"
                                                      placeholder="Adres Giriniz"
                                                      class="form-control">{{ old('adres',$entry->detay->adres) }}</textarea>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Telefon</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="telefon"
                                                   value="{{old('telefon', $entry->detay->telefon) }}"
                                                   placeholder="Telefon  Giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Cep Telefonu</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="ceptelefonu"
                                                   value="{{ old('ceptelefonu',$entry->detay->ceptelefonu) }}"
                                                   placeholder="Cep Telefonunuzu Giriniz" class="form-control">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Aktif Mi</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="hidden" id="checkbox1" name="aktif_mi" value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="aktif_mi" value="1"
                                                               class="form-check-input" {{ old('aktif_mi',$entry->aktif_mi) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Yönetici Mi</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="hidden" id="checkbox1" name="yonetici_mi" value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="yonetici_mi"
                                                               value="1"
                                                               class="form-check-input" {{ old('yonetici_mi', $entry->yonetici_mi) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>
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
