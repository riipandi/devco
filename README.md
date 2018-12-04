<div align="center">
  <img alt="DEVCO Logo" src="https://image.flaticon.com/icons/svg/1312/1312124.svg" height="140" />
  <h3 align="center">DEVCO - Platfom Kolaboratif Developer Indonesia</h3>
  <p><em>Tempat berbagi ide dan cerita para developer di Indonesia.</em></p>
</div>

<p align="center">
  <a href="https://travis-ci.org/riipandi/devco"><img src="https://travis-ci.org/riipandi/devco.svg" alt="Build Status"></a>
  <a href="https://buddy.works/"><img src="https://app.buddy.works/ruhaycreative/devco/pipelines/pipeline/162534/badge.svg?token=d7c3e693bc482a0e18287637dd2d22e5545e4b8692ee9693373adc64036f922d" alt="Deploy Status"></a>
  <a href="https://github.styleci.io/repos/144719625"><img src="https://github.styleci.io/repos/144719625/shield?branch=master" alt="StyleCI"></a>
  <a href="https://scrutinizer-ci.com/g/riipandi/devco/?branch=master"><img src="https://scrutinizer-ci.com/g/riipandi/devco/badges/quality-score.png?b=master" alt="Code Quality"></a>
  <a href="https://codeclimate.com/github/riipandi/devco/maintainability"><img src="https://api.codeclimate.com/v1/badges/5b7c15adca5e099faa23/maintainability"></a>
  <a href="./LICENSE"><img src="https://img.shields.io/badge/License-MPL%202.0-brightgreen.svg" alt="License"></a>
</p>

---

### Daftar Isi
- [Ikhtisar](#ikhtisar)
- [Panduan Penggunaan](#panduan-penggunaan)
    - [Kebutuhan Server](#kebutuhan-server)
    - [Proses Instalasi](#proses-instalasi)
- [Komponen dan Pustaka](#komponen-dan-pustaka)
    - [Dependensi](#dependensi)
    - [Paket Pustaka](#paket-pustaka)
- [Pengembang dan Kontributor](#pengembang-dan-kontributor)
- [Panduan Berkontribusi](#panduan-berkontribusi)
- [Lisensi](#lisensi)

## Ikhtisar

DEVCO / devco.id adalah sebuah platform media kolaboratif bagi
para pengembang di Indonesia. Sebuah ruang dimana para developer
dan pegiat teknologi informasi berbagi dan bertukar pikiran.
Bagikan cerita, tutorial, ide, gagasan kamu seputar dunia
komputasi disini.

## Panduan Penggunaan

### Kebutuhan Server

1. PHP >= 7.2;
2. Nodejs >= 10.x;
3. Yarn >=
4. MySQL >= 5.7 atau MariaDB >= 10.3;
5. Redis Server >= 3.2;

### Proses Instalasi

```bash
# Instal dependensi
composer update --no-interaction
yarn install && yarn dev

# Inisiasi
php artisan migrate:fresh --seed
php artisan user:createadmin --email=admin@devco.test --password=admin
php artisan vendor:publish --tag=telescope-assets --force
php artisan storage:link
```

(opsional) generate dummy user: `php artisan db:seed --class=UsersTableSeeder`

## Komponen dan Pustaka

### Dependensi

- :TODO

### Paket Pustaka

- :TODO

## Pengembang dan Kontributor

Saat ini proyek ini dikelola oleh [@Aris Ripandi](https://github.com/riipandi)
dan dikembangkan bersama para [kontributor](https://github.com/riipandi/devco/graphs/contributors).

## Panduan Berkontribusi

Kontribusi terhadap proyek ini dipersilahkan. Proyek ini mematuhi
[_Kode Etik Contributor Covenant_](./CODE_OF_CONDUCT.md). Dengan
berpartisipasi, Anda diharapkan untuk menjunjung kode ini. Silahkan
baca terlebih dahulu [panduan berkontribusi](./CONTRIBUTING.md).
Untuk pertanyaan, silahkan mengirimkan email ke ripandi@pm.me.

## Lisensi

Program ini adalah perangkat lunak bebas: Anda dapat mendistribusikannya
dan atau memodifikasinya sesuai dengan lisensi yang diberikan. Kecuali
disebutkan secara spesifik, program ini dilisensikan dibawah ketentuan
[Lisensi Publik Mozilla versi 2.0](https://choosealicense.com/licenses/mpl-2.0/).
Silakan lihat berkas [LISENSI](./LICENSE) untuk naskah selengkapnya.
