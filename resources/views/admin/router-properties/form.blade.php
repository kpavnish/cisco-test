<div class="form-group {{ $errors->has('sapid') ? 'has-error' : ''}}">
    <label for=sapid class="control-label">{{ 'SapId' }}</label>
    <input class="form-control" name="sapid" type="text" id="sapid" value="{{ isset($routerproperty->sapid) ? $routerproperty->sapid : ''}}" >
    {!! $errors->first('sapid', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('host_name') ? 'has-error' : ''}}">
    <label for="host_name" class="control-label">{{ 'Host Name' }}</label>
    <input class="form-control" name="host_name" type="text" id="host_name" value="{{ isset($routerproperty->host_name) ? $routerproperty->host_name : ''}}" >
    {!! $errors->first('host_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('loop_back') ? 'has-error' : ''}}">
    <label for="loop_back" class="control-label">{{ 'Loop Back' }}</label>
    <input class="form-control" name="loop_back" type="text" id="loop_back" value="{{ isset($routerproperty->loop_back) ? $routerproperty->loop_back : ''}}" >
    {!! $errors->first('loop_back', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mac_address') ? 'has-error' : ''}}">
    <label for="mac_address" class="control-label">{{ 'Mac Address' }}</label>
    <input class="form-control" name="mac_address" type="text" id="mac_address" value="{{ isset($routerproperty->mac_address) ? $routerproperty->mac_address : ''}}" >
    {!! $errors->first('mac_address', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
