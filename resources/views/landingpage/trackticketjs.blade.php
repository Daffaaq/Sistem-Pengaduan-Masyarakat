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
                @if (isset($ticketStatus))
                    <p>Ticket Status: {{ $ticketStatus }}</p>
                @else
                    <p>No ticket status found.</p>
                @endif
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
        $('#trackComplaintForm').submit(function(event) {
            // ...
            $('#trackResultModal').modal('show'); // Show the modal
        });

        // Menangani penutupan modal secara manual
        $('#closeModalButton').click(function() {
            $('#trackResultModal').modal('hide');
        });
        $('#closeModalX').click(function() {
            $('#trackResultModal').modal('hide');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#trackComplaintForm').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                success: function(response) {
                    $('#trackResultModal .modal-body').html(
                        response.ticketStatus ?
                        '<p>Ticket Status: ' + response.ticketStatus + '</p>' :
                        '<p>No ticket status found.</p>'
                    );
                },
                error: function() {
                    $('#trackResultModal .modal-body').html(
                        '<p>An error occurred while tracking the ticket.</p>');
                },
                complete: function() {
                    $('#trackResultModal').modal('show');
                }
            });
        });
    });
</script>
