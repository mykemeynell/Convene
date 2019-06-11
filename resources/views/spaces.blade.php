@extends('layouts.page', ['page_title' => 'Spaces'])

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Space</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://placehold.it/50" alt="Space Icon">
                            <span>Space name</span>
                        </td>
                        <td>
                            Description of space
                        </td>
                        <td align="right">
                            <a href="#" class="btn btn-outline-dark btn-sm">Options</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
