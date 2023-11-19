@foreach($tasks as $task)
<tr>
    <th>{{$task->nom}}</th>
    <td>{{$task->description}}</td>
    <td class="d-flex gap-2 justify-content-center">
        <form action="{{ Gate::allows('crud-tasks') ? route('edit.task', ['id' => $task->id]) : '#' }}" method="GET">
            <button type="submit" class="btn btn-success" {{ Gate::denies('crud-tasks') ? 'disabled' : '' }}>
                Modifier
            </button>
        </form>

        <form action="{{ Gate::allows('crud-tasks') ? route('delete.task', ['id' => $task->id]) : '#' }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-danger" {{ Gate::denies('crud-tasks') ? 'disabled' : '' }}>
                Supprimer
            </button>
        </form>

    </td>


</tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $tasks->links() !!}
    </td>
</tr>