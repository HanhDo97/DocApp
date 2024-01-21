<div class="row d-flex justify-content-center">
    <div class="col-md-10 col-12">
        <div class="row mb-2">
            <div class="col-2">
                <button wire:click="addUser({{$username}})" class="btn btn-success">Thêm</button>
            </div>
            <div class="col-4">
                <input placeholder="name" style="width: 100%;" type="text" value="{{$name}}">
            </div>
            <div class="col-4">
                <input placeholder="username" style="width: 100%;" type="text" value="{{$username}}">
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
</script>