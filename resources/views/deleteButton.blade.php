<tr>
    <td>{{ $obj->name }} 
        related to:
        @if(\App\Models\Usuario::find($obj->usuario_id)->name != null)
            {{ \App\Models\Usuario::find($obj->usuario_id)->name }}
        @endif
        @if(isset($obj->lname))
            {{ $obj->lname }}
        @endif
        <td>
        <form method="POST" action="/delete/{{ $obj->id }}">
            @csrf
            @method('delete')
            <input type="submit" name="delete" value="delete">
        </form>
        </td>
    </td>
</tr>