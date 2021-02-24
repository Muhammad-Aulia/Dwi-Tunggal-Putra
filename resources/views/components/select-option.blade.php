<div class="form-group ">
    <label for="{{$name}}">{{$label}}</label>
    <select class="form-control select2 select-search w-100 d-block" id="{{$name}}" name="{{$name}}" placeholder="{{$label}}" {{$required?'required':''}} {{$readonly?'readonly':''}}>
        @foreach($options as $option)
            <option value="{{$option->value}}" extras="{{isset($option->extra)?$option->extra:''}}">{{$option->label}}</option>
        @endforeach
    </select>
</div>