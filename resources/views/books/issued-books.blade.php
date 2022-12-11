@extends('layouts.master')

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Issued Books</h4>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Books</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Books List</a></li>

    </ol> --}}
</div>
@endsection

@section('content')
@include('includes.flash')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th data-priority="1">#</th>
                            <th data-priority="2">Books ID</th>
                            <th data-priority="3">Name</th>
                            <th data-priority="4">Image</th>
                            <th data-priority="5">Issued DateTime</th>
                            <th data-priority="6">Returned DateTime</th>
                            <th data-priority="7">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$book->mybook->unique_book_id}}</td>
                            <td>{{$book->mybook->book_name}}</td>
                            <td>
                                <img src="{{ asset($book->mybook->book_image) }}" width="50px" height="50px">
                            </td>
                            <td>{{$book->assigned_datetime}}</td>
                            <td>{{$book->returned_datetime ?? '--'}}</td>
                            <td>
                                @if(empty($book->returned_datetime))
                                <a href="{{ route("book.returned.status", $book->id) }}" onclick="return confirm('Are you sure? you would like to return this book.');" class="btn btn-warning btn-sm edit btn-flat"><i
                                        class='fa fa-edit'></i> Returned</a>
                                @else
                                <span class="badge badge-primary">Return Success</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>No records found..</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

@endsection