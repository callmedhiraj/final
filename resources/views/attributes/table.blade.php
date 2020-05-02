<div class="table-responsive-sm">
    <table class="table table-striped" id="attributes-table">
        <thead>
            <th>Feature</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($attributes as $attribute)
            <tr>
                <td>{!! $attribute->feature !!}</td>
                <td>
                    {!! Form::open(['route' => ['attributes.destroy', $attribute->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('attributes.show', [$attribute->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('attributes.edit', [$attribute->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
