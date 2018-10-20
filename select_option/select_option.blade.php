{{-- post edit.blade.php file --}}

<div class="form-group row">
  <label class="col-md-3 col-form-label text-md-right">Category</label>
  <div class="col-md-7">
    <select class="form-control" name="category_id">
      <option value="">Select Category</option>
      @if ($categories)
        @foreach ($categories as $category)
          <option {{ $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      @endif
    </select>
  </div>
</div>
__________________________________________________________________
{{-- post model --}}

public function category()
{
  return $this->belongsTo('App\Category');
}
__________________________________________________________________
