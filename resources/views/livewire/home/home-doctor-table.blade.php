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
                    <input wire:model="speciality" placeholder="speciality" style="width: 100%;" type="text" value="{{$speciality}}">
                    @error('speciality') <small>{{$message}}</small> @enderror
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
                    <th scope="col">Speciality</th>
                    <th scope="col">User Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr wire:key="{{$doctor->id}}">
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->user->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>