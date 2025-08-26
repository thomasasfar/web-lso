@if ($data->image)
    <img id="preview" src="{{ '/storage/images/' . $table . '/' . $data->image }}" alt="{{ $data->image }}"
        class="form-group hidden" width="240">
@else
    <img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100"
        height="100">
@endif
