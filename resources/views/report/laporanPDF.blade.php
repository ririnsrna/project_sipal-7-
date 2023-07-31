<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>SIPAL - Laporan Peminjaman</h1>
    <p>Tanggal : {{ $tanggal }}</p>

    <table id="customers">
        <tr>
            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Nama Siswa</th>
            <th scope="col" class="sort" data-sort="budget" style="font-size:15px">Nama Barang</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Kategori</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Tanggal Peminjaman</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Tanggal Dikembalikan</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Lama Peminjaman</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Status</th>
            <th scope="col" class="sort" data-sort="status" style="font-size:15px">Diterima Oleh</th>
        </tr>
        @forelse($peminjam as $p)
            <tr>

                <td class="name mb-0 text-sm">
                    <span class="name mb-0 text-sm">
                        <span class="status">{{ $p->member->nama_member }}</span>
                    </span>
                </td>

                <td class="budget">
                    <span class="name mb-0 text-sm">
                        <span class="status">{{ $p->alat->nama_barang }}</span>
                    </span>
                </td>

                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">{{ $p->alat->kategori->nama_kategori }}</span>
                    </span>
                </td>

                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">{{ $p->created_at }}</span>
                    </span>
                </td>


                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">
                            @if ($p->keadaan == 'Belum Dikembalikan')
                                -
                            @else
                                {{ $p->updated_at }}
                            @endif
                        </span>
                    </span>
                </td>

                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">
                            @if ($p->keadaan == 'Belum Dikembalikan')
                                -
                            @else
                                {{ $p->lama }} Hari
                            @endif
                        </span>
                    </span>
                </td>

                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">
                            {{ $p->keadaan }}
                        </span>
                    </span>
                </td>

                <td>
                    <span class="name mb-0 text-sm">
                        <span class="status">
                            @if ($p->keadaan == 'Belum Dikembalikan')
                                -
                            @else
                                {{ $p->user->name }}
                            @endif
                        </span>
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                    Belum Ada Yang Meminjam
                </td>
            </tr>
        @endforelse
    </table>

    <p>Total Peminjam : {{ $countPeminjam }}</p>

</body>

</html>




{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Report - Sistem Parkir</title>
</head>

<body>
    <main>
        <h1>Laporan Parkir</h1>

        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Nomor Polisi</th>
                    <th scope="col" class="sort" data-sort="budget" style="font-size:15px">Kendaraan</th>
                    <th scope="col" class="sort" data-sort="status" style="font-size:15px">Waktu Masuk</th>
                    <th scope="col" class="sort" data-sort="status" style="font-size:15px">Waktu Keluar</th>
                    <th scope="col" class="sort" data-sort="status" style="font-size:15px">Biaya</th>
                </tr>
            </thead>
            <tbody class="list">
                @forelse($pendaraan as $p)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    @if ($p->no_kendaraan)
                                        <span class="name mb-0 text-sm">{{ $k->no_kendaraan }}</span>
                                    @else
                                        <span class="name mb-0 text-sm">{{ $k->vehicle->no_kendaraan }}</span>
                                    @endif
                                </div>
                            </div>
                        </th>
                        <td class="budget">
                            {{ $k->vehicle->tipe }}
                        </td>
                        <td>
                            <span class="name mb-0 text-sm">
                                <span class="status">{{ $k->waktu_masuk }}</span>
                            </span>
                        </td>
                        @if ($k->waktu_keluar)
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">{{ $k->waktu_keluar }}</span>
                                </span>
                            </td>
                        @else
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">Belum Keluar</span>
                                </span>
                            </td>
                        @endif
                        <td>
                            <span class="name mb-0 text-sm">
                                <span class="status">{{ $k->tarif }}</span>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                            Belum Ada Kendaraan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </main>



</body>

</html> --}}
