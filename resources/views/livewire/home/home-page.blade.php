<div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8" style="background-color: rgb(247 247 247 /1);">
            <div class="row d-flex justify-content-center">
                <button type="button" wire:click="changeTab('users')" class="btn btn-primary mt-2 mb-2 mr-2">Users</button>
                <button type="button" wire:click="changeTab('doctors')" class="btn btn-success mt-2 mb-2 mr-2">Doctors</button>
                <button type="button" wire:click="changeTab('categories')" class="btn btn-primary mt-2 mb-2 mr-2">Categories</button>
                <button type="button" wire:click="changeTab('list_type')" class="btn btn-success mt-2 mb-2 mr-2">List Type</button>
            </div>

            <livewire:home.home-body />

        </div>
    </div>


</div>