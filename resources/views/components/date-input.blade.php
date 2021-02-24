<div class="form-group ">
    <label for="{{$name}}">{{$label}}</label>
    <input type="date" class="form-control" id="{{$name}}" value="{{$value}}" name="{{$name}}" placeholder="{{$label}}" {{$required?'required':''}} {{$disabled?'disabled':''}} {{$readonly?'readonly':''}}>
</div>