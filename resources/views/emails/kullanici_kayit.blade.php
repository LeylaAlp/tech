<h1>{{ config('app.name') }}</h1>
<p>Merhaba {{ $kullanici->adsoyad }}, Kaydınız Başarılı Bir Şekilde Oluşturuldu</p>
<p>Kaydınızı Aktifleştirmek için <a href="{{ config('app.url') }}/kullanici/aktiflestir/{{ $kullanici->aktivasyon_anahtari }}">tıklayınız</a>
Veya aşağıdaki bağlantıyı tarayıcınızda açınız</p>
<p>{{ config('app.url') }}/kullanici/aktiflestir/{{ $kullanici->aktivasyon_anahtari }}</p>
