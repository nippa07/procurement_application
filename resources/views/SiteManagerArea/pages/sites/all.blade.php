@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6">
                    <h6 class="h2 text-dark d-inline-block mb-0">Sites</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Sites</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="">
                        <a href="{{route('siteManager.sites.add')}}" class="btn btn-sm btn-neutral float-right">
                            <i class="fa fa-plus-circle"></i> Add Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card border-0 shadow">
    <div class="table-responsive py-4">
        <table id="sites" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Site</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($sites as $key=> $site)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $site->name }}</td>
                    <td>{{ $site->phone }}</td>
                    <td>
                        {{ $site->address_1 }}, <br>
                        {{ $site->address_2 }}
                    </td>
                    <td class="text-left">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="dropdown-divider responsive-moblile"></div>
                                <a class="dropdown-item" href="{{route('siteManager.sites.edit', $site->id)}}">
                                    <i class="fas fa-user-edit text-warning"></i>&nbsp;Edit
                                </a>
                                <div class="dropdown-divider responsive-moblile">
                                </div>
                                <a class="dropdown-item delete-user" data-id="{{$site->id}}" href="javascript:void(0)">
                                    <i class="fas fa-user-times text-danger"></i>&nbsp;Delete
                                </a>
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#sites').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            }
        });

        $('[data-toggle="tooltip"]').tooltip()
    });
    $(".delete-user").on('click', function () {
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'Are you sure?',
            content: 'This will delete this site permanently',
            buttons: {
                confirm: function () {
                    window.location.href = '{{ url("siteManager/sites/delete") }}/' + id;
                },
                cancel: function () {

                },
            }
        });

    });

</script>
@endsection
