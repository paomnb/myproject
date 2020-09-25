<div class="form-group {{ $errors->has('Brand') ? 'has-error' : ''}}">
    <label for="Brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="Brand" type="text" id="Brand" value="{{ isset($vehicle->Brand) ? $vehicle->Brand : ''}}" >
    {!! $errors->first('Brand', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Series') ? 'has-error' : ''}}">
    <label for="Series" class="control-label">{{ 'Series' }}</label>
    <input class="form-control" name="Series" type="text" id="Series" value="{{ isset($vehicle->Series) ? $vehicle->Series : ''}}" >
    {!! $errors->first('Series', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Color') ? 'has-error' : ''}}">
    <label for="Color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="Color" type="text" id="Color" value="{{ isset($vehicle->Color) ? $vehicle->Color : ''}}" >
    {!! $errors->first('Color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Year') ? 'has-error' : ''}}">
    <label for="Year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="Year" type="number" id="Year" value="{{ isset($vehicle->Year) ? $vehicle->Year : ''}}" >
    {!! $errors->first('Year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Mileage') ? 'has-error' : ''}}">
    <label for="Mileage" class="control-label">{{ 'Mileage' }}</label>
    <input class="form-control" name="Mileage" type="number" id="Mileage" value="{{ isset($vehicle->Mileage) ? $vehicle->Mileage : ''}}" >
    {!! $errors->first('Mileage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($vehicle->user_id) ? $vehicle->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
