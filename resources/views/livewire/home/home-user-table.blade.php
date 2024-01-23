    <div class="col-md-10 col-12">
        <form wire:submit.prevent="save">
            <div class="row mb-2">
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
                <div class="col-4">
                    <input wire:model="username" placeholder="username" style="width: 100%;" type="text" value="{{$username}}">
                    @error('username') <small>{{$message}}</small> @enderror
                </div>
                <div class="col-4">
                    <input wire:model="password" placeholder="password" style="width: 100%;" type="text" value="{{$password}}">
                    @error('password') <small>{{$message}}</small> @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <input wire:model="userImage" type="file">
                </div>
                @if ($userImage)
                <img src="{{ $userImage->temporaryUrl() }}">
                @endif
            </div>

        </form>

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr wire:key="{{$user->id}}">
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button type="button" wire:click.prevent="delete({{$user->id}})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>