@extends('yonetim.layouts.master')
@section('title','Urun Yönetimi')

@section('content')

    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">


                                <form class="form-header" action="{{ route('yonetim.urun') }}" method="POST">
                                    @csrf
                                    <input class="au-input au-input--xl" type="text" name="aranan" value="{{ old('aranan') }}" placeholder="Ürün Adı Ara.." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <a class="au-btn--submit" type="button" href="{{ route('yonetim.urun') }}">
                                            <span class="btn-outline-danger">  Temizle </span>
                                        </a>

                                </form>

                                <a href="{{ route('yonetim.urun.yeni') }}">
                                    <button class="btn btn-primary btn-md">
                                        <i class="zmdi zmdi-plus"></i> Yeni
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-30">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Resim</th>
                                        <th>Slug</th>
                                        <th>Ürün Adı</th>
                                        <th>Fiyatı</th>
                                        <th>Kayıt Tarihi</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $entry)
                                        <tr>
                                            <td>{{ $entry->id }}</td>
                                            <td>
                                                <img style="height:80px; width:100px;" src="{{ $entry->detay->urun_resmi!=null ?
                                             asset('/images/urunler/'.$entry->detay->urun_resmi) : 'http://via.placeholder.com/400x485?text=UrunResmi'}}" alt="">
                                            </td>
                                            <td>{{ $entry->slug }}</td>
                                            <td>{{ $entry->urun_adi }}</td>
                                            <td>{{ $entry->fiyati }} ₺</td>
                                            <td>{{ $entry->olusturulma_tarihi }}</td>

                                            <td>
                                                <a href="{{ route('yonetim.urun.duzenle',$entry->id) }}"><span
                                                        class="btn-outline-success">Düzenle</span></a>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)"><span id="{{ $entry->id }}"
                                                                                   class="btn-outline-danger">Sil</span></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        {{ $list->links() }}

                        <!-- END DATA TABLE-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        $(".btn-outline-danger").click(function () {
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme İşlemini Onaylayın', 'Bu işlem Geri Alınamaz!',
                function () {
                    location.href = "/yonetim/urun/sil/" + destroy_id;

                },
                function () {
                    alertify.error('Silme İşlemi Başarısız!')
                }
            )


        });
    </script>


@endsection
