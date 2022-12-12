<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
		}
        table {
            display: table;
        }
        table tr {
            display: table-cell;
        }
        table tr td {
            display: block;
        }
	</style>
	<center>
		<h5>PLOTINGAN MUNAQOSAH</h5>
	</center>
    <p style="text-align: center;">Diperbarui: {{now()}}</p>

    @foreach($array as $angkatan => $array_materi)
        <br>
        <p style="margin-top: 10pt; margin-bottom: 0pt; font-size: 12pt; font-weight: bold;">Kelas {{$angkatan}}</p>
        @foreach($array_materi as $materi)
        <div style="width:100%;">
            <p style="margin-bottom: 0pt;">- Materi Makna: {{$materi->materi." (".$materi->keterangan.")"}}</p>
            <p style="margin-bottom: 0pt;">- Hafalan: {{($materi->hafalan == "" ? "Tidak ada" : $materi->hafalan)}}</p>
            <table style="width:100%; margin-top: 5pt; margin-bottom: 5pt; float: left;" border="1" cellpadding="5">
                <tbody>
                @foreach($materi['jadwalMunaqosahs'] as $jadwalMunaqosah)
                <tr>
                    <td>{{$jadwalMunaqosah->sesi}}</td>
                    @foreach($jadwalMunaqosah->plots as $plot)
                        <td>{{$plot->user->name}}</td>
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        <div>
        @endforeach 
    @endforeach       
</body>
</html>