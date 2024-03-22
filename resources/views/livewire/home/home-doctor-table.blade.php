    <div class="col-md-10 col-12">
        <form wire:submit="save">
            <div class="row mb-2">
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
                <div class="col-3">
                    <input wire:model="doctorName" placeholder="doctorName" style="width: 100%;" type="text" value="{{$doctorName}}">
                    @error('doctorName') <small>{{$message}}</small> @enderror
                </div>
                <div class="col-3">
                    <input wire:model="about" placeholder="about" style="width: 100%;" type="text" value="{{$about}}">
                    @error('about') <small>{{$message}}</small> @enderror
                </div>
                <div class="col-3">
                    <input wire:model="userName" placeholder="userName" style="width: 100%;" type="text" value="{{$userName}}">
                    @error('userName') <small>{{$message}}</small> @enderror
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">About</th>
                    <th scope="col">User Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr wire:key="{{$doctor->id}}">
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->about}}</td>
                    <td>{{$doctor->user->name}}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit-doctor" wire:click="$dispatch('editDoctor',{ id: {{ $doctor->id }} })">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>