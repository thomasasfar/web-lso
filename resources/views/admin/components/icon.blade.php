@if ($data->image)
    <img id="preview" src="{{ '/storage/images/' . $table . '/' . $data->image }}" alt="{{ $data->image }}"
        class="form-group hidden" width="40">
@else
    <img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="32"
        height="32">
@endif
