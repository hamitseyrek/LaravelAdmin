Auth ekranlarıyla beraber ilk kurulum için 

-laravel new LaravelAdmin --auth

komutunu kullanıyoruz. Bu sayede giriş çıkış kayıt ekranları ve boş bir admin paneli oluşmaktadır


**************************

Matrix Admin entegrasyonu yapıldı. 


Kullanılan paketler

- laravel collective -form işlemleri için
- laravel sweet alert - alert işlemleri için

Ara güvenlik katmanı middleware tanımı

php artisan make:middleware isim
komutu ile oluşturduktan sonra kernel.php içinde protected kısmına tanıtıyoruz
