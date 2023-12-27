<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Surat Keluar {{ $dataSuratKeluar->nomor_surat_keluar }} - {{ $dataSuratKeluar->tanggal_surat_keluar }}
    </title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");

        body {
            font-family: serif;
            /* font-family: "Inter", sans-serif; */
            font-size: 14px;
            line-height: 1.5;
        }

        p {
            font-size: .9rem;

        }

        .text-bold {
            font-weight: bold;
        }

        .border-bottom-dotted {
            border-bottom: 1px dotted black;
        }

        .title-disposisi {
            text-decoration: underline;
            text-underline-offset: 1em;
            margin-bottom: 45px;
        }

        .container {
            padding: 15px 25px;
        }

        .keterangan-wrapper {
            border-bottom: 3px solid black;
            margin-bottom: 1.3px;
        }

        .logo-wrapper {
            width: 130px;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-right: 5px;
            padding-left: 20px;
            float: left;
        }

        .logo {
            aspect-ratio: 1/1;
            min-width: 150px;
            max-width: 150px;
        }

        .keterangan-instansi {
            width: 470px;
            padding-top: 10px;
            padding-bottom: 5px;
            padding-left: 5px;
            padding-right: 20px;
            float: right;
            text-align: center;
            line-height: .9;
            margin-top: 15px
        }

        .keterangan-instansi h2 {
            margin-bottom: 7px !important;
            margin-top: 0;
            font-size: 1.3rem;
        }

        .isi-surat-wrappper {
            width: 100%;
            padding: 15px;
            border-top: 2px solid black;
        }

        .tanggal-surat-keluar {
            float: right;
            width: 200px;
            font-size: .9rem;
        }

        .keterangan-instansi {
            width: 480px;
            float: left;
        }

        .keterangan-surat p {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 0;
            font-size: .9rem;
        }

        .tujuan-surat {
            margin-top: 35px;
        }

        .tujuan-surat p {
            margin-top: 4px;
            margin-bottom: 0;
        }

        .isi-surat {
            margin-top: 20px;
        }

        .ttd {
            margin-top: 30px;
        }

        .small {
            line-height: 1.1;
            font-size: .7rem !important;
        }

        .ttd-disposisi {
            width: 290px;
            float: right;
        }

        .ttd-disposisi .tanggal-tdd {
            line-height: 1.1;
        }

        .ttd-disposisi .tanggal-tdd p {
            font-size: .8rem !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-evenly">
            <div class="keterangan-wrapper">
                <div class="logo-wrapper">
                    @if ($dataWeb->default_logo)
                        <img src="{{ public_path('image_save/' . $dataWeb->default_logo) }}" alt="logo"
                            width="100px" class="logo">
                    @else
                        <p style="color:red;">Harap isi logo instansi di halaman web setting!</p>
                    @endif
                </div>
                <div class="keterangan-instansi">
                    <h2 style="text-transform: uppercase;"> pemerintah provinsi banten Dinas
                        pendidikan dan kebudayaan
                        unit
                        pelaksanaan teknis</h2>
                    <h2 style="text-transform: uppercase"> {{ $dataWeb->instansi->nama_instansi }}</h2>
                    <div class="small">
                        <span style="display: block;">{{ $dataWeb->instansi->alamat_instansi }}</span>
                        <span>Telepon : {{ $dataWeb->instansi->nomor_telpon }}</span>
                        <span>Email : {{ $dataWeb->instansi->email }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="isi-surat-wrappper">
            <div class="tanggal-surat-keluar">
                {{ Carbon\Carbon::parse($dataSuratKeluar->tanggal_surat_keluar)->isoFormat('dddd, D MMMM Y') }}
            </div>
            <div class="keterangan-surat">
                <p>Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataSuratKeluar->nomor_surat_keluar) !!}</p>
                <p>Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                    Penting</p>
                <p>Lampiran &nbsp;&nbsp;&nbsp;&nbsp;: 1 (satu) Lembar</p>
                <p>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataSuratKeluar->perihal) !!}</p>
            </div>
            <div class="tujuan-surat">
                <p>Kepada Yth. </p>
                <p class="text-bold">{{ $dataSuratKeluar->instansiPenerima->nama_instansi }}</p>
                <p>Di tempat.</p>
            </div>
            <div class="isi-surat">
                <p>
                    {!! $dataSuratKeluar->isi_surat !!}.
                </p>
            </div>
            <div class="ttd">
                <div class="ttd-disposisi">
                    <div class="tanggal-tdd">
                        <p class="small">Tangerang, <span>...........................</span>
                            <br>
                            Plt. Kepala {{ $dataWeb->instansi->nama_instansi }}
                        </p>
                        <br>
                        <br>
                        <br>
                        <p class="small">
                            <span class="text-bold" style="text-decoration: underline; text-transform: uppercase;">
                                {{ $dataWeb->ketua->nama }}
                            </span>
                            <br>
                            NIP. {{ convertToNIP($dataWeb->ketua->nip) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>