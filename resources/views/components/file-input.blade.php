<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" class="form-control" name="{{$name}}" id="{{$name}}" placeholder="{{$label}}" {{$required?'required':''}} {{$disabled?'disabled':''}} {{$readonly?'readonly':''}}>
</div>
