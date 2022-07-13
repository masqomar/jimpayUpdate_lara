<div class="mb-3">
    <label for="title" class="form-label">Code</label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ old('code') ?? $accounttransaction->code }}" placeholder="code">
    @error('code')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $accounttransaction->name }}" placeholder="name">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $accounttransaction->description }}</textarea>
    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $label }}</button>