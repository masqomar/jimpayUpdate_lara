<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $producttype->name }}" placeholder="name">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="content" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $producttype->description }}</textarea>
    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $label }}</button>