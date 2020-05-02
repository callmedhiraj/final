<div class="table-responsive-sm">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                    {{--{!!  $user->outlet_id ? '<label class="badge badge-danger"><i class="fa fa-building"></i> '.$user->outlet->name.'</label>' : '' !!}--}}
                </td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                            <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-ghost-success'><i
                                        class="fa fa-eye"></i></a>

                            <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>

                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
</div>
