@extends('yonetim.layouts.master')
@section('title','Ürün Yönetimi')


@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection



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
                                <strong>Ürün {{ $entry->id >0 ? 'Güncelle' : 'Kayıt' }} </strong> Formu
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('yonetim.urun.kaydet',$entry->id) }}" method="post"
                                      enctype="multipart/form-data" class="form-horizontal">
                                    @csrf


                                    <div class="row form-group">


                                        @if($entry->detay->urun_resmi != null)
                                            <img src="/images/urunler/{{ $entry->detay->urun_resmi }}" alt="Ürün Resmi"
                                            style="height: 200px; margin-right: 20px;" class="pull-left">

                                            <div class="col-12 col-md-9">
                                                <label for="text-input" class=" form-control-label">Ürün Resmi</label>
                                                <br>
                                                <br>
                                                <input type="file" name="urun_resmi" class="form-control">
                                            </div>
                                            @else
                                            <div  class="col-md-3">
                                                <label for="text-input" class=" form-control-label">Ürün Resmi</label>
                                            </div>
                                        <div class="col-12 col-md-9">
                                                <input type="file" name="urun_resmi" class="form-control">
                                            </div>
                                        @endif

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ürün Adı</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="urun_adi"
                                                   value="{{ old('urun_adi',$entry->urun_adi) }}"
                                                   placeholder="Ürün Adını Giriniz" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Slug</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" id="email-input" name="original_slug"
                                                   value="{{ $entry->slug }}">
                                            <input type="text" id="email-input" name="slug"
                                                   value="{{ old('slug',$entry->slug) }}" placeholder="Slug Giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Açıklama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="aciklama" id="editor" rows="5"
                                                      placeholder="Açıklama Giriniz"
                                                      class="form-control">{{ old('aciklama',$entry->aciklama) }}</textarea>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Fiyat</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="fiyati"
                                                   value="{{old('fiyati', $entry->fiyati) }}"
                                                   placeholder="Fiyatı  Giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>



                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Kategoriler</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="kategoriler[]" id="select" class="form-control" multiple>
                                                @foreach($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ collect(old('kategoriler',$urun_kategorileri))->contains($kategori->id) ? 'selected' : '' }}>
                                                        {{ $kategori->kategori_adi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row form-group">

                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <label class=" form-control-label">Slider'da Göster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <input type="hidden" id="checkbox1" name="goster_slider"
                                                               value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="goster_slider"
                                                               value="1"
                                                               class="form-check-input" {{ old('goster_slider',$entry->detay->goster_slider) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <label class=" form-control-label">Günün Fırsatın'da Göster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <input type="hidden" id="checkbox1" name="goster_gunun_firsati"
                                                               value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1"
                                                               name="goster_gunun_firsati" value="1"
                                                               class="form-check-input" {{ old('goster_gunun_firsati',$entry->detay->goster_gunun_firsati) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <label class=" form-control-label">Öne Çıkanlar'da Göster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <input type="hidden" id="checkbox1" name="goster_one_cikan"
                                                               value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="goster_one_cikan"
                                                               value="1"
                                                               class="form-check-input" {{ old('goster_one_cikan',$entry->detay->goster_one_cikan) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <label class=" form-control-label">Çok Satanlar'da Göster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <input type="hidden" id="checkbox1" name="goster_cok_satan"
                                                               value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="goster_cok_satan"
                                                               value="1"
                                                               class="form-check-input" {{ old('goster_cok_satan',$entry->detay->goster_cok_satan) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <label class=" form-control-label">İndirimli Ürünler'de Göster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;</label>
                                                        <input type="hidden" id="checkbox1" name="goster_indirimli"
                                                               value="0"
                                                               class="form-check-input">
                                                        <input type="checkbox" id="checkbox1" name="goster_indirimli"
                                                               value="1"
                                                               class="form-check-input" {{ old('goster_indirimli',$entry->detay->goster_indirimli) ? 'checked' : '' }}>
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


@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>


    <script>

        $(function(){

            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );

            $('#select').select2({
                placeholder: '                   '
            });



        });



    </script>
@endsection
