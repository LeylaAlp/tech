@extends('yonetim.layouts.master')
@section('title','Kategori')

@section('content')



    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">


                                <form class="form-header" action="{{ route('yonetim.kategori') }}" method="POST">
                                    @csrf
                                    <input class="au-input au-input--xl" type="text" name="aranan" value="{{ old('aranan') }}" placeholder="Ad, Email Ara.." />
&nbsp;
                                    <select name="ust_id"  class="form-control">
                                        <option value="">Seçiniz</option>
                                        @foreach($anakategoriler as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('ust_id') == $kategori->id ? 'selected': '' }}>{{ $kategori->kategori_adi }}</option>
                                        @endforeach
                                    </select>
                                    &nbsp;&nbsp;

                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <a href="{{ route('yonetim.kategori') }}"><button class="au-btn--submit" type="submit">
                                            <span>  Temizle </span>
                                        </button></a>

                                </form>
                                <a href="{{ route('yonetim.kategori.yeni') }}">
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
                                        <th>Slug</th>
                                        <th>Üst Kategori</th>
                                        <th>Kategori Adı</th>
                                        <th>Kayıt Tarihi</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($list)==0)
                                        <td colspan="7">
                                           <h4> Kayıt Bulunamadı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                        </td>
                                        @else
                                    @foreach($list as $entry)
                                        <tr>
                                            <td>{{ $entry->id }}</td>
                                            <td>{{ $entry->slug }}</td>
                                            <td>{{ $entry->ust_kategori->kategori_adi }}</td>
                                            <td>{{ $entry->kategori_adi }}</td>
                                            <td>{{ $entry->olusturulma_tarihi }}</td>

                                            <td>
                                                <a href="{{ route('yonetim.kategori.duzenle',$entry->id) }}"><span
                                                        class="btn-outline-success">Düzenle</span></a>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)"><span id="{{ $entry->id }}"
                                                                                   class="btn-outline-danger">Sil</span></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                        @endif
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
                    location.href = "/yonetim/kategori/sil/" + destroy_id;

                },
                function () {
                    alertify.error('Silme İşlemi Başarısız!')
                }
            )


        });
    </script>


@endsection
