<div class="row d-flex justify-content-center">
    @if($type == 'users')
    <livewire:home.home-user-table />
    @elseif($type == 'doctors')
    <livewire:home.home-doctor-table />
    @elseif($type == 'categories')
    <livewire:home.home-category-table />
    @elseif($type == 'list_type')
    <livewire:home.home-list-type-table />
    @endif
</div>

<script>
</script>