<div align="center">
  <img alt="DEVCO Logo" src="https://image.flaticon.com/icons/svg/1312/1312124.svg" height="140" />
  <h3 align="center">DEVCO - Platfom Kolaboratif Developer Indonesia</h3>
  <p><em>Tempat berbagi ide dan cerita para developer di Indonesia.</em></p>
</div>

<p align="center">
  <a href="https://travis-ci.org/riipandi/devco"><img src="https://travis-ci.org/riipandi/devco.svg" alt="Build Status"></a>
  <a href="https://buddy.works/"><img src="https://app.buddy.works/ruhaycreative/devco/pipelines/pipeline/165403/badge.svg?token=d7c3e693bc482a0e18287637dd2d22e5545e4b8692ee9693373adc64036f922d" alt="Deploy Status"></a>
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
  - [Backend](#backend)
  - [Frontend](#frontend)
- [Usage](#usage)
  - [Create an user](#create-an-user)
  - [Log in with email and password](#log-in-with-email-and-password)
  - [Check the validation of requested data](#check-the-validation-of-requested-data)
  - [Get database rollback error in response for duplicated data](#get-database-rollback-error-in-response-for-duplicated-data)
  - [Get a collection of users with auth token](#get-a-collection-of-users-with-auth-token)
- [Pengembang dan Kontributor](#pengembang-dan-kontributor)
- [Panduan Berkontribusi](#panduan-berkontribusi)
- [Lisensi](#lisensi)

## Ikhtisar

DEVCO / devco.id adalah sebuah platform media kolaboratif bagi
para pengembang di Indonesia. Sebuah ruang dimana para developer
dan pegiat teknologi informasi berbagi dan bertukar pikiran.
Bagikan cerita, tutorial, ide, gagasan kamu seputar dunia
komputasi disini.

This is a simple REST API using Falcon web framework. Falcon is
a high-performance Python framework for building cloud APIs, smart
proxies, and app backends. More information can be found
[here](https://falconframework.org/).

## Panduan Penggunaan

This project uses [virtualenv](https://virtualenv.pypa.io/en/stable/) as
isolated Python environment for installation and running. Therefore,
[virtualenv](https://virtualenv.pypa.io/en/stable/) must be installed.
And you may need a related dependency library for a PostgreSQL database.

### Kebutuhan Server

1. Python >= 3.6;
2. Nodejs >= 10.13;
3. Yarn >= 1.12;
4. PostgreSQL >= 11.0;
5. Redis Server >= 3.2;

### Proses Instalasi

```bash
# Setup environment
rm -rf .venv ; virtualenv -p python3 .venv
source .venv/bin/activate
pip install -r requirements.txt

# Dependensi
yarn install --non-interactive --ignore-optional
yarn dev

# Supervisor service
cp supervisor.conf /etc/supervisor/conf.d/devco-api.conf

sudo supervisorctl reread
sudo systemctl restart supervisor
sudo systemctl status supervisor
sudo supervisorctl status
```

## Komponen dan Pustaka

### Backend

:TODO

### Frontend

:TODO

## Usage

### Create an user

- Request
```shell
curl -XPOST http://localhost:5000/v1/users -H "Content-Type: application/json" -d '{
 "username": "test1",
 "email": "test1@gmail.com",
 "password": "test1234"
}'
```

- Response
```json
{
  "meta": {
    "code": 200,
    "message": "OK",
  },
  "data": null
}
```

### Log in with email and password

- Request
```shell
curl -XGET http://localhost:5000/v1/users/self/login -H "Content-Type: application/json" -d '{
 "email": "test1@gmail.com",
 "password": "test1234"
}'
```

- Response
```json
{
  "meta": {
    "code": 200,
    "message": "OK"
  },
  "data": {
    "username": "test1",
    "token": "gAAAAABV-TpG0Gk6LhU5437VmJwZwgkyDG9Jj-UMtRZ-EtnuDOkb5sc0LPLeHNBL4FLsIkTsi91rdMjDYVKRQ8OWJuHNsb5rKw==",
    "email": "test1@gmail.com",
    "created": 1442396742,
    "sid": "3595073989",
    "modified": 1442396742
  }
}
```

### Check the validation of requested data

- Request
```shell
curl -XPOST http://localhost:5000/v1/users -H "Content-Type: application/json" -d '{
 "username": "t",
 "email": "test1@gmail.c",
 "password": "123"
}'
```

- Response
```json
{
  "meta": {
    "code": 88,
    "message": "Invalid Parameter",
    "description": {
      "username": "min length is 4",
      "email": "value does not match regex '[a-zA-Z0-9._-]+@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,4}'",
      "password": [
        "value does not match regex '[0-9a-zA-Z]\\w{3,14}'",
        "min length is 8"
      ]
    }
  }
}
```

### Get database rollback error in response for duplicated data

- Request
```shell
curl -XPOST http://localhost:5000/v1/users -H "Content-Type: application/json" -d '{
 "username": "test1",
 "email": "test1@gmail.com",
 "password": "test1234"
}'
```

- Response
```json
{
  "meta": {
    "code": 77,
    "message": "Database Rollback Error",
    "description": {
      "details": "(psycopg2.IntegrityError) duplicate key value violates unique constraint \"user_email_key\"\nDETAIL:  Key (email)=(test1@gmail.com) already exists.\n",
      "params": "{'username': 'test1', 'token': 'gAAAAABV-UCq_DneJyz4DTuE6Fuw68JU7BN6fLdxHHIlu42R99sjWFFonrw3eZx7nr7ioIFSa7Akk1nWgGNmY3myJzqqbpOsJw==', 'sid': '6716985526', 'email': 'test1@gmail.com', 'password': '$2a$12$KNlGvL1CP..6VNjqQ0pcjukj/fC88sc1Zpzi0uphIUlG5MjyAp2fS'}"
    }
  }
}
```

### Get a collection of users with auth token

- Request
```shell
curl -XGET http://localhost:5000/v1/users/100 -H "Authorization: gAAAAABV6Cxtz2qbcgOOzcjjyoBXBxJbjxwY2cSPdJB4gta07ZQXUU5NQ2BWAFIxSZlnlCl7wAwLe0RtBECUuV96RX9iiU63BP7wI1RQW-G3a1zilI3FHss="
```

- Response
```json
{
  "meta": {
    "code": 200,
    "message": "OK"
  },
  "data": [
    {
      "username": "test1",
      "token": "gAAAAABV-UCAgRy-ee6t4YOLMW84tKr_eOiwgJO0QcAHL7yIxkf1fiMZfELkmJAPWnldptb3iQVzoZ2qJC6YlSioVDEUlLhG7w==",
      "sid": "2593953362",
      "modified": 1442398336,
      "email": "test1@gmail.com",
      "created": 1442398336
    },
    {
      "username": "test2",
      "token": "gAAAAABV-UCObi3qxcpb1XLV4GnCZKqt-5lDXX0YAOcME5bndZjjyzQWFRZKV1x54EzaY2-g5Bt47EE9-45UUooeiBM8QrpSjA==",
      "sid": "6952584295",
      "modified": 1442398350,
      "email": "test2@gmail.com",
      "created": 1442398350
    },
    {
      "username": "test3",
      "token": "gAAAAABV-UCccDCKuG28DbJrObEPUMV5eE-0sEg4jn57usBmIADJvkf3r5gP5F9rX5tSzcBhuBkDJwEJ1mIifEgnp5sxc3Z-pg==",
      "sid": "8972728004",
      "modified": 1442398364,
      "email": "test3@gmail.com",
      "created": 1442398364
    }
  ]
}
```

## Pengembang dan Kontributor

Saat ini proyek ini dikelola oleh [Aris Ripandi](https://github.com/riipandi)
dan dikembangkan bersama para [kontributor](https://github.com/riipandi/devco/graphs/contributors).

## Panduan Berkontribusi

Kontribusi terhadap proyek ini dipersilahkan dan terbuka bagi siapapun.
Silahkan baca terlebih dahulu [panduan berkontribusi](./CONTRIBUTING.md).
Dengan berpartisipasi, anda diharapkan untuk menjunjung [kode etik](./CODEOFCONDUCT.md).
Untuk pertanyaan, silahkan mengirimkan email ke manajer proyek di alamat
ripandi@pm.me.

## Lisensi

Program ini adalah perangkat lunak bebas: Anda dapat mendistribusikannya
dan atau memodifikasinya sesuai dengan lisensi yang diberikan. Kecuali
disebutkan secara spesifik, program ini dilisensikan dibawah ketentuan
[Lisensi Publik Mozilla versi 2.0](https://choosealicense.com/licenses/mpl-2.0/).
Silakan lihat berkas [LISENSI](./LICENSE) untuk naskah selengkapnya.
