<div class="row d-flex justify-content-center">
    @if($type == 'users')
    <livewire:home.home-user-table />
    @elseif($type == 'doctors')
    <livewire:home.home-doctor-table />
    @endif
</div>

<script>
</script>