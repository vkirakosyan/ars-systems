@extends('layouts.backend')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{URL('css/jquery-ui.min.css')}}">
    <div class="modal fade" id="sorting-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-label">Sort Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-auto">
            <table class="table table-bordered table-condensed table-hover table-responsive" id="sortable">
                <thead>
                    <tr class="ui-sortable-handle">
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Position</th>
                        <th scope="col">Sort Position</th>
                    </tr>
                </thead>
                <tbody class="sort-body ui-sortable">
                    @foreach($team as $item)
                        <tr class="ui-state-default ui-sortable-handle" style="cursor: move">
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{$item->getCategory->name}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->sort_position}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="save-sorting">Save current positions</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Team</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/team/create') }}" class="btn btn-success btn-sm" title="Add New Team">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <button class="btn btn-secondary btn-sm text-white" title="Change Sorting Order" data-toggle="modal" data-target="#sorting-modal">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i> Change Sorting Order
                        </button>
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/team', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($team as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->position }}</td>
                                        <td>
                                            <a href="{{ url('/admin/team/' . $item->id) }}" title="View Team"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/team/' . $item->id . '/edit') }}" title="Edit Team"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/team', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Team',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $team->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{URL('js/jquery-1.12.1.min.js')}}"></script>
    <script type="text/javascript">
        let obj = {};
        $('table').on('mouseover','.sort-body',() => {
            $('.sort-body').sortable();
            $('.sort-body').disableSelection();
        });
        $('table').on('mouseup', '.sort-body tr', () => {
            let i=1;
            setTimeout(function(){
                $('#sortable').find('tr:not(:first)').each(function(){
                    let id = $(this).find('td:first').html();
                    obj[id] = i;
                    $(this).find('td:last').html(i++);
                });
            },300);
        });
        $("#save-sorting").on('click', () => {
            $.post('team/sortMembers', {obj, _token: '{{ csrf_token() }}'}, () => location.reload());
        });
    </script>
@endsection