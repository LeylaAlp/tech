@extends('yonetim.layouts.master')
@section('title','Kullanıcı')

@section('content')

    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1"></h2>
                                <a href="{{ route('yonetim.kullanici.yeni') }}">
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
                                        <th>Ad Soyad</th>
                                        <th>Email</th>
                                        <th>Aktif Mi</th>
                                        <th>Yönetici Mi</th>
                                        <th>Kayıt Tarihi</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $entry)
                                        <tr>
                                            <td>{{ $entry->id }}</td>
                                            <td>{{ $entry->adsoyad }}</td>
                                            <td>{{ $entry->email }}</td>
                                            <td>
                                                @if($entry->aktif_mi)
                                                    <span class="btn-outline-success">Aktif</span>
                                                @else
                                                    <span class="btn-outline-danger">Pasif</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($entry->yonetici_mi)
                                                    <span class="btn-outline-success">Yönetici</span>
                                                @else
                                                    <span class="btn-outline-danger">Müşteri</span>
                                                @endif
                                            </td>
                                            <td>{{ $entry->olusturulma_tarihi }}</td>

                                            <td>
                                                <a href="{{ route('yonetim.kullanici.duzenle',$entry->id) }}"><span
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
                    location.href = "/yonetim/kullanici/sil/" + destroy_id;

                },
                function () {
                    alertify.error('Silme İşlemi Başarısız!')
                }
            )


        });
    </script>


@endsection
