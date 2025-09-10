<h2>Konfirmasi Pemesanan Tiket</h2>
<p>Terima kasih, {{ $data['nama'] }} telah memesan tiket.</p>
<ul>
    <li>Email: {{ $data['email'] }}</li>
    <li>Kategori: {{ $data['kategori'] }}</li>
    <li>Jumlah: {{ $data['jumlah'] }}</li>
    <li>Tanggal: {{ $data['tanggal'] }}</li>
    <li>Harga: Rp {{ number_format($data['harga'], 0, ',', '.') }}</li>
</ul>
