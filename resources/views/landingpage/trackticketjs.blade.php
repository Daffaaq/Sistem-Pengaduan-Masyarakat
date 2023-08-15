<div class="modal fade" id="trackResultModal" tabindex="-1" role="dialog" aria-labelledby="trackResultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trackResultModalLabel">Ticket Tracking Result</h5>
                <button type="button" class="close" data-dismiss="modal" id="closeModalX">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="userName">Nama Pengadu: No user name found.</p>
                <p id="ticketStatus">Status Pengaduan: No ticket status found.</p>
                <p id="ticketTitle">Judul Pengaduan: No ticket title found.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalButton">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi yang akan dijalankan ketika halaman selesai dimuat

        $('#trackComplaintForm').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara biasa

            var form = $(this); // Mengambil referensi form yang disubmit
            var formData = form
                .serialize(); // Mengambil data formulir dalam format yang sesuai untuk dikirim
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                success: handleSuccess,
                error: handleError
            });
        });

        function handleSuccess(response) {
            var userName = response.userName ? maskString(response.userName, 3) :
                'No user name found.';
            var ticketStatus = response.ticketStatus ? response.ticketStatus :
                'No ticket status found.';
            var ticketTitle = response.ticketTitle ? maskString(response.ticketTitle, 3) :
                'No ticket title found.';

            updateModalContent(userName, ticketStatus, ticketTitle);
            showModal();
        }

        function handleError() {
            var errorMessage = 'An error occurred while tracking the ticket.';
            updateModalContent(errorMessage, errorMessage, errorMessage);
            showModal();
        }

        function updateModalContent(userName, ticketStatus, ticketTitle) {
            $('#userName').text(`Nama Pengadu: ${userName}`);
            $('#ticketStatus').text(`Status Pengaduan: ${ticketStatus}`);
            $('#ticketTitle').text(`Judul Pengaduan: ${ticketTitle}`);
        }

        function showModal() {
            $('#trackResultModal').modal('show');
        }

        function maskString(inputString, visibleChars) {
            return inputString.substr(0, 3) + '*'.repeat(inputString.length - 3);
        }

        $('#closeModalButton, #closeModalX').click(function() {
            $('#trackResultModal').modal('hide');
        });
    });
</script>
