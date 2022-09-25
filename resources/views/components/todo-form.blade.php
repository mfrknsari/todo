<form method="POST" action="{{$route}}">
    @csrf
    @if($todo)
        @method('PATCH')
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Başlık</label>
        <input type="text" class="form-control" placeholder="Başlık" @if($todo) value="{{$todo->title}}"
               @endif name="title">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Açıklama</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="3">@if($todo){{$todo->description}}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Bitiş Tarihi</label>
        <input name="dead_at" type="datetime-local" class="form-control" @if($todo)value="{{$todo->dead_at}}"
               @endif id=""/>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>