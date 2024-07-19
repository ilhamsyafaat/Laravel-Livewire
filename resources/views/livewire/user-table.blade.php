<div>
    @include('my_components.alert_success')

    <div class="mb-3">
        <input wire:model.live="search" type="text" class="form-control" placeholder="Cari User...">
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $item)
            <tr>
                {{-- <td>{{ $index + 1 }}</td> --}}
                <td>{{ $users->firstItem() + $index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('users.details', $item->id) }}" class="badge bg-primary">Detail</a>
                    <a href="{{ route('users.edit', $item->id) }}" class="badge bg-warning">Edit</a>
                    <button wire:click="delete({{  $item->id }})" wire:confirm="Are you sure want to delete this user?" class=" btn badge bg-danger">Delete</button>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
