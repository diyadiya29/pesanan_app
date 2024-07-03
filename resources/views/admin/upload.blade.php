<form action="{{ route('upload.photo') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="photo">Upload Photo</label>
        <input type="file" name="photo" id="photo">
    </div>
    <button type="submit">Upload</button>
</form>