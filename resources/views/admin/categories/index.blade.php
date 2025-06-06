@extends('layouts.admin')
@section('title', 'Admin | Categories')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Categories</h3>
                    </div>
                    <div class="col-sm-6 justify-content-end d-flex">
                        <button class="btn btn-primary" onclick="createOrEdit.assignInitValue()" data-bs-toggle="modal" data-bs-target="#create-category">
                            <i class="bi bi-plus"></i>
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:10%">#</th>
                                    <th scope="col" style="width:10%">ID</th>
                                    <th scope="col" style="width:20%">Title</th>
                                    <th scope="col" style="width:20%">Slug</th>
                                    <th scope="col" style="width:10%" class="text-center">Home Screen</th>
                                    <th scope="col" style="width:10%">Status</th>
                                    <th scope="col" style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="categories-list">
                                <!-- Dynamic Render -->
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="page-navigation">
                                <ul class="pagination justify-content-center" id="categories-pagination">
                                    <!-- Dynamic Render -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include("admin.categories.constant.index")
    @include("admin.categories.createOrEdit.index")
    @include("admin.categories.delete.index")
    <script>
        list.fetch();
    </script>
@endsection