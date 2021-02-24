<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <textarea class="form-control" name="{{$name}}" id="{{$name}}" rows="{{$totalRow}}"  {{$required?'required':''}} {{$disabled?'disabled':''}}>{{$value}}</textarea>
</div>