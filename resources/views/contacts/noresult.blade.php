{{-- didn't use this controller coz using datatables plugin instead --}}
@extends('layouts.master')
@section('content')
<div class="card">
    <!-- Default card contents -->
    <div class="card-header bg-info">
        <div class="row">
            <div class="col-md-8">
               <a href="/" class="no-underline">
                    <h3 class="card-title text-white">Contact List</h3>
                </a>
            </div>
            <div class="col-md-3">
                {{-- search function --}}
                <form action="/search" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <a href="{{ route('contacts.create')}}" title="Add Contact" class="btn btn-info float-right"><i class="fas fa-plus fa-2x"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!-- Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 20%">First Name</th>
                    <th style="width: 20%">Last Name</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 20%">Phone</th>
                    <th style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <div class="alert alert-info" role="alert">
                  No Result found. Please try again !'
              </div>
            </tbody>
        </table>
    </div>
    <!-- first card body -->
</div>
@endsection