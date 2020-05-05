@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Create</div>

                        <div class="card-body">
                            <form action="{{ route('importexport.store') }}" method="POST"
                                  enctype="multipart/form-data">
                            @csrf
                            <!-- Blog add form start -->
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Blog Title</label>
                                            <input type="text" value="{{ old('title') }}"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   placeholder="Enter blog title" name="title">
                                            @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="link">Blog link</label>
                                            <input type="url" value="{{ old('link') }}"
                                                   class="form-control @error('link') is-invalid @enderror"
                                                   placeholder="Enter blog link" name="link">
                                            @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="summary">Summary</label>
                                            <textarea name="summary"
                                                      class="form-control @error('summary') is-invalid @enderror"
                                                      rows="8">{{ old('summary') }}</textarea>
                                            @error('summary')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      rows="8">{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                            Changes
                                        </button>
                                    </div>
                                </div>
                                <!-- Blog add form ends -->
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Import Data</div>
                        <div class="card-body">
                            <form action="{{ route('importexport.import') }}" method="POST"
                                  enctype="multipart/form-data">
                            @csrf
                            <!-- Blog add form start -->
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Import & Export CSV</label>
                                            <input type="file" value="csv" accept=".xls,.xlsx"
                                                   class="form-control" name="csv">
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Import
                                        </button>
                                        <a  href="{{ route('importexport.export') }}"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Export
                                        </a>
                                    </div>
                                </div>
                                <!-- Blog add form ends -->
                            </form>

                        </div>
                    </div>
                    <div class="card" style="margin-top: 1em;">
                        <div class="card-header">Data List</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-thumb-view">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Summary</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $datas)
                                        <tr>
                                            <td></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $datas->title }}</td>
                                            <td>{{ $datas->link }}</td>
                                            <td>{{ $datas->summary }}</td>
                                            <td>{{ $datas->description }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

