
<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" 
           name="name" 
           type="text" id="name" 
           value="{{ old('name', optional($category)->name) }}" 
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="Enter category name" />
        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="description">Description</label>
    <input class="form-control" 
           name="description" 
           type="text" 
           id="description" 
           value="{{ old('description', optional($category)->description) }}" 
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="Enter description">
    {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
</div>






