<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
</head>
<body>
    
        <center>
            <h2>Makah Wedding Service</h2>
            <h3>Bukti Transaksi Pembayaran</h3>
            
        </center>
        <table  style="width: 100%;">
        <thead>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$transaksi->pesanan->konsumen->nama}}</td>

            </tr>
            <tr>
                <td>Paket</td>
                <td>:</td>
                <td>{{$transaksi->pesanan->paket->deskripsi}}</td>

            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td>:</td>
                <td>{{$transaksi->metode}}</td>

            </tr>
            <tr>
               <td>Nominal</td>
               <td>:</td>
               <td><?PHP echo "Rp. " . number_format($transaksi->nominal, 0, ".", "."); ?></td>

            </tr>
            <tr>
               <td>Pembayaran</td>
               <td>:</td>
               <td>{{$transaksi->pembayaran}}</td>

            </tr>
            <tr>
               <td>Status</td>
               <td>:</td>
               <td>{{$transaksi->status}}</td>

            </tr>
            <tr>
              <td>Tanggal</td>
              <td>:</td>
              <td>{{$transaksi->tgl}}</td>

            </tr>
            <!-- <tr>
              <td>Bukti Pembayaran</td>
              <td>:</td>
                                                  <td><img  align:center; src="{{URL::to('/')}}/foto/{{$transaksi->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$transaksi->foto}}" ></td>

            </tr> -->
            
        </thead>
        
    </table>
</body>
</html>