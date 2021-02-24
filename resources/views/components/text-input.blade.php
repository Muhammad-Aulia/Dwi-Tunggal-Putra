<div class="form-group ">
    <label for="{{$name}}">{{$label}}</label>
    <input type="text" class="form-control" id="{{$name}}" value="{{$value}}" name="{{$name}}" placeholder="{{$label}}" {{$required?'required':''}} {{$disabled?'disabled':''}} {{$readonly?'readonly':''}}>
</div>