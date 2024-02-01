<div>
    <h1>Edit Scholarship</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" wire:model="program" class="form-control">
            @error('program') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!-- Add form fields for other scholarship properties here -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
