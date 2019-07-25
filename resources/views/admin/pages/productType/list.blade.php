@extends('admin.layouts.master')
@section('content')
    <h1 class="d-sm-inline-block">Danh sách loại sản phẩm</h1>
    <button type="button" class="btn btn-success float-right d-sm-inline-block" data-toggle="modal"
            data-target="#add-productType"><i class="fas fa-plus"></i></button>
    <div class="modal fade" id="add-productType" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                    </div>
                    <div class="row" style="margin: 5px">
                        <div class="col-xl-8 mb-2 offset-2">
                            <form role="form" id="tableProductType" method="post">
                                @csrf
                                <fieldset class="form-group">
                                    <label class="d-sm-inline-block float-left">Name</label>
                                    <input class="form-control name-productType" name="name"
                                           placeholder="Nhập tên category">
                                    <span class="error mt-2 d-lg-block w-100"
                                          style="font-size: 16px; color: red !important;"></span>
                                </fieldset>
                                <div class="form-group">
                                    <label class="d-sm-inline-block">Category</label>
                                    <select class="form-control name-Category" name="idCategory">
                                        @foreach($category as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-sm-inline-block">Status</label>
                                    <select class="form-control status-productType" name="status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0">Không Hiển Thị</option>
                                    </select>
                                </div>
                                <input type="submit" id="add-productType" class="btn btn-success" value="Thêm"></input>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Tên Thể Loại Sản Phẩm</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody id="table-ProductType">

        </tbody>
    </table>
    <!-- Edit Modal-->
    <div class="modal fade" id="editProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm<p
                            class="title d-inline-flex ml-1"></p></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12 mb-2">
                            <form role="form" id="formProduct" action="{{ route('producttype.store') }}">
                                <input type="hidden" name="id" class="id-productType">
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input class="form-control name" id="name" name="name"
                                           placeholder="Nhập Loại sản phẩm">
                                    <span class="error mt-2 d-lg-block w-100"
                                          style="font-size: 16px; color: red !important;"></span>
                                </fieldset>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control idCategory" name="idCategory">
                                        @foreach($category as $cate)
                                            <option value={{ $cate->id }} >{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control status" id="status" name="status">
                                        <option value=1>Hiển Thị</option>
                                        <option value=0>Không Hiển Thị</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success updateProductType">Save</button>

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="deleteProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delete">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
@endsection
