<label class="form-label" for="name">Sub Category<span style="color: red">*</span></label>
            <select class="form-control form-control-lg @error('subcategory_id') is-invalid @enderror" value="{{ old('subcategory_id') }}" name="subcategory_id" id="subcategory_id">
              <option>Select SubCategory</option>
              @foreach($subcategories as $subcategory)
              <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
              @endforeach
            </select>
            @error('subcategory_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror