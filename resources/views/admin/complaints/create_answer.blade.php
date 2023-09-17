<!DOCTYPE html>
<html>

<head>
    <title>Tambah Jawaban Pengaduan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-5 shadow p-5 bg-light" id="form-all">
            <h2 class="h3 text-center mb-4">Tambah Jawaban Pengaduan</h2>
            <div class="mb-3">
                <label for="complaint_title" class="form-label">Judul Pengaduan</label>
                <input type="text" class="form-control" id="complaint_title" value="{{ $complaint->title }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="complaint_description" class="form-label">Deskripsi Pengaduan</label>
                <textarea class="form-control" id="complaint_description" rows="5" readonly>{{ $complaint->description }}</textarea>
            </div>
            <form action="{{ route('admin.complaints.answer.store', $complaint->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="answer" class="form-label">Jawaban</label>
                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="5"
                        required></textarea>
                    @error('answer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.complaints.index') }}" class="btn btn-info mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Tambah Jawaban</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var answerTextarea = document.getElementById('answer');
            var jamSekarang = new Date().getHours();

            if (jamSekarang >= 0 && jamSekarang < 12) {
                var salam = "Selamat Pagi";
            } else if (jamSekarang >= 12 && jamSekarang < 17) {
                var salam = "Selamat Siang";
            } else {
                var salam = "Selamat Malam";
            }

            var format = "Assalamualaikum Wr. Wb\n" + salam + "\n\n\n\nTerimakasih Wasalamuaalikum Wr. Wb";
            answerTextarea.value = format;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
