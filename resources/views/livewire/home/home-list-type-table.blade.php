    <div class="col-md-10 col-12">
        <form wire:submit="save">
            <div class="row mb-2">
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
                <div class="col-5">
                    <input require wire:model="name" placeholder="Enter Type Name " style="width: 100%;" type="text" value="{{$name}}">
                    @error('name') <small>{{$message}}</small> @enderror
                </div>
                <div class="col-5">
                    <input require wire:model="code" placeholder="Enter Type Code" style="width: 100%;" type="text" value="{{$code}}">
                    @error('code') <small>{{$message}}</small> @enderror
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>