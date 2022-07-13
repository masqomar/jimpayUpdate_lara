<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $kopkarproduct->name }}" placeholder="name">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <select name="product_types_id" class="form-select">
        @foreach ($product_types as $product_type)
        <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $kopkarproduct->description }}</textarea>
    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $label }}</button>