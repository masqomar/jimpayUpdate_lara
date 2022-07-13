<div class="mb-3">
    <label for="cover" class="form-label">Cover</label>
    @isset($blog->cover)
    <br>
    <img src="{{ asset('storage/'.$blog->cover) }}" alt="cover" class="rounded-3 mb-2" height="250" width="auto">
    @endisset
    <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="cover">
    @error('cover')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') ?? $blog->title }}" placeholder="Title">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea class="form-control" name="content" id="content" rows="3">{{ old('content') ?? $blog->content }}</textarea>
    @error('content')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $label }}</button>