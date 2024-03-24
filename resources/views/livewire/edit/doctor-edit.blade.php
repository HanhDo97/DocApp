<!-- livewire/edit/doctor-edit.blade.php -->

<div class="modal fade {{$class}}" id="edit-doctor" tabindex="-1" role="dialog" aria-labelledby="edit-doctor-label" aria-hidden="true" style="{{$style}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($editName)
                <input type="text" class="form-control" wire:model="doctorName">
                @error('doctorName') <small>{{$message}}</small> @enderror

                <button wire:click='toggleEditMode("editName")' style="margin-left: 1rem;" type="button" class="btn btn-info"><i class="bi bi-check-lg"></i></button>
                @else
                <h5 class="modal-title" id="edit-doctor-label">{{$doctorName}}</h5>
                <button wire:click='toggleEditMode("editName")' style="margin-left: 1rem;" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button>
                @endif

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Email address: </label>
                        <input type="email" class="form-control" wire:model="userEmail">
                        @error('userEmail') <small>{{$message}}</small> @enderror

                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select wire:model='doctorCate' class="form-control">
                            @foreach($categories as $cate)
                            <option value="{{$cate['code']}}">{{$cate['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>About:</label>
                        <textarea wire:model='doctorAbout' class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click='saveChange()' type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('doctorUpdated', function() {
        $('#edit-doctor').modal('hide');
    });

    document.addEventListener('editDoctor', function() {
        setTimeout(function() {
            $('.modal-backdrop').each(function(index) {
                if (index > 0) {
                    $(this).remove();
                }
            });
        }, 1);
    });
</script>