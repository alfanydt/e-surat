<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat Upah Lembur</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 40px;
        }
        .underline {
            text-decoration: underline;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .signature {
            margin-top: 40px;
        }
        .signature-container {
            display: flex;
            justify-content: space-between;
        }
        .signature-left {
            flex: 1;
            text-align: left;
        }
        .signature-right {
            flex: 1;
            text-align: right;
        }
        .signature-center {
            flex: 1;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <p class="text-right">{{ $data['letter_date'] }}</p>

    <p>Kepada Yth :<br>
    {{ $data['recipient'] }}<br>
    {{ $data['address'] }}</p>

    <p>Dengan hormat,</p>

    <p>Yang bertanda tangan dibawah ini :</p>
    <blockquote>
        <p>
            Nama    : {{ $data['sender_name'] }}<br>
            Jabatan : {{ $data['sender_position'] }}
        </p>
    </blockquote>

    <p>Sehubungan dengan pelaksanaan {{ $data['overtime_reason'] }}, dengan ini kami mengajukan permohonan upah lembur untuk karyawan berikut:</p>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jumlah Hari</th>
            </tr>
        </thead>
        <tbody>
            @foreach (explode("\n", $data['employee_details']) as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ explode(',', $employee)[0] }}</td>
                <td>{{ explode(',', $employee)[1] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Demikian permohonan ini kami ajukan untuk mendapatkan persetujuan.</p>

    <div class="signature-container">
        <div class="signature-left">
            <p>
                Disetujui,<br>
                <strong>{{ $data['approval1'] }}</strong><br>
                {{ $data['approval1_position'] }}
            </p>
        </div>
        <div class="signature-right">
            <p>
                Yang mengajukan,<br>
                <strong>{{ $data['approval2'] }}</strong><br>
                {{ $data['approval2_position'] }}
            </p>
        </div>
    </div>
    <div class="signature-center">
        <p>
            Mengetahui dan menyetujui,<br>
            <strong>{{ $data['approval3'] }}</strong><br>
            {{ $data['approval3_position'] }}
        </p>
    </div>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>
</body>
</html>
