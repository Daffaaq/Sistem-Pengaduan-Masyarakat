<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #78C1F3;
        }
        h1 {
            text-align: center
        }
    </style>
</head>

<body>
    @if ($department)
        <h1>Laporan Complaints Departemen {{ $department->name }}</h1>
    @else
        <h1>Laporan Complaints Semua Departemen</h1>
    @endif
    <table>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Date</th>
            <th>Description</th>
            <th>Status</th>
            <th>Nama Departemen</th>
        </tr>
        @foreach ($complaints as $cp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cp->title }}</td>
                <td>{{ $cp->complaint_date }}</td>
                <td>{{ $cp->description }}</td>
                <td>{{ $cp->status }}</td>
                <td>{{ $cp->department->name }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
