<div class="mb-3">
    <label for="title" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $member->name }}" placeholder="name">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') ?? $member->email }}" placeholder="email">
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Gender</label>
    <select name="gender" class="form-select">
        <option value="laki-laki">Laki-Laki</option>
        <option value="perempuan">Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label for="title" class="form-label">No member</label>
    <input type="text" name="no_anggota" class="form-control @error('no_anggota') is-invalid @enderror" id="no_anggota" value="{{ old('no_anggota') ?? $member->no_anggota }}" placeholder="no_anggota">
    @error('no_anggota')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">No Telepon</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') ?? $member->phone }}" placeholder="phone">
    @error('phone')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="profile_image" class="form-label">Photo</label>
    @isset($member->profile_image)
    <br>
    <img src="{{ asset('storage/'.$member->profile_image) }}" alt="profile_image" class="rounded-3 mb-2" height="250" width="auto">
    @endisset
    <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image">
    @error('profile_image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $label }}</button>