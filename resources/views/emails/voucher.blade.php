<!DOCTYPE html>
<html>

<head>
    <title>Formulir Voucher</title>
</head>

<body>
    <h2>Formulir Voucher</h2>
    <p>Terima kasih telah mengisi formulir. Berikut adalah detail formulir Anda:</p>
    <ul>
        <li>Nama: {{ $nama }}</li>
        <li>Email: {{ $email }}</li>
        <li>Nomor Polisi: {{ $nopol }}</li>
        <li>Nama Merchant: {{ $merchant_id }}</li>
        <li>Nama Voucher: {{ $voucher_id }}</li>
        <li>Masa Berlaku Voucher: {{ $masa_berlaku }}</li>
    </ul>
    <p>Silakan simpan informasi ini.</p>
</body>

</html>
