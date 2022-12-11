@extends('layouts.master')

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Books</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Books</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Books List</a></li>

    </ol>
</div>
@endsection

@section('content')
@include('includes.flash')

<div class="row">
    <a href="{{ route('books.history') }}" class="btn btn-danger" style="">Your History</a>
    <div class="col-12">
        <div class="card">
            <form action="{{ route('books.index') }}" method="post">
                @csrf
                <div class="input-group">
                    <div class="form-outline">
                        <input id="search-input" type="search" name="search_input" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button id="search-button" type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="card-body">
                <table class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th data-priority="1">Books ID</th>
                            <th data-priority="2">Name</th>
                            <th data-priority="3">Availblity</th>
                            <th data-priority="4">Image</th>
                            <th data-priority="5">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td>{{$book->unique_book_id}}</td>
                            <td>{{$book->book_name}}</td>
                            <td>
                                @if($book->availability == 1)
                                <span class="badge badge-primary">Available</span>
                                @else
                                <span class="badge badge-light">Not Available</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset($book->book_image) }}" width="50px" height="50px">
                            </td>
                            <td>
                                @if($book->availability == 1)
                                <a href="{{ route("books.status.changed", $book->id) }}" onclick="return confirm('Are you sure you would like to accuire this book?');" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Issue</a>
                                @else
                                --
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
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