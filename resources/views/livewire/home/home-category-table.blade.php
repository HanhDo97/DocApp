    <div class="col-md-10 col-12">
        <form wire:submit="save">
            <div class="row mb-2">
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
                <div class="col-5">
                    <input require wire:model="cateName" placeholder="Enter Name " style="width: 100%;" type="text" value="{{$cateName}}">
                    @error('cateName') <small>{{$message}}</small> @enderror
                </div>
                <div class="col-5">
                    <input require wire:model="cateCode" placeholder="Enter Code" style="width: 100%;" type="text" value="{{$cateCode}}">
                    @error('cateCode') <small>{{$message}}</small> @enderror
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
                @foreach($children as $child)
                <tr wire:key="{{$child->id}}">
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$child->name}}</td>
                    <td>{{$child->code}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>