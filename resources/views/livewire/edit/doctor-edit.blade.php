<!-- livewire/edit/doctor-edit.blade.php -->

<div class="modal fade" id="edit-doctor" tabindex="-1" role="dialog" aria-labelledby="edit-doctor-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-doctor-label">Doctor Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display doctor information here -->
                Name: {{ $name }}<br>
                About: {{ $about }}<br>
                <!-- Add other fields as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('editDoctor', (doctor) => {
        // Show the modal
        $('#edit-doctor').modal('show');
    });
</script>