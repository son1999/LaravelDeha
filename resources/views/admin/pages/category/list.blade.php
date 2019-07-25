@extends('admin.layouts.master')
@section('content')
<h1 class="d-sm-inline-block">Danh sách Thể loại sản phẩm</h1>
<button type="button" class="btn btn-success float-right d-sm-inline-block" data-toggle="modal" data-target="#add-category"><i class="fas fa-plus"></i></button>
<div class="modal fade" id="add-category" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-xl-8 mb-2 offset-2">
                        <form role="form" id="table" method="post">

                            <fieldset class="form-group">
                                <label class="d-sm-inline-block float-left">Name</label>
                                <input class="form-control name-category" name="name" placeholder="Nhập tên category">
                                <span class="error mt-2 d-lg-block w-100" style="font-size: 16px; color: red !important;"></span>
                            </fieldset>
                            <div class="form-group">
                                <label class="d-sm-inline-block">Status</label>
                                <select class="form-control status-category" name="status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                            <input type="submit" id="add-cate" class="btn btn-success" value="Thêm"></input>
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
            <th>Tên Thể Loại Sản Phẩm</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody id="tableCate">
        
    </tbody>
</table>
<div class="pull-right">{{ $category->links() }}</div>
<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm<p class="title d-inline-flex ml-1"></p></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12 mb-2">
                        <form role="form" id="form_category">
                            <input type="hidden" name="id" class="id-category">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input class="form-control name" name="name" placeholder="Nhập tên category">
                                <span class="error mt-2 d-lg-block w-100" style="font-size: 16px; color: red !important;"></span>
                            </fieldset>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control status" name="status">
                                    <option value=1 >Hiển Thị</option>
                                    <option value=0 >Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success update">Save</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success del">Có</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
                </div>
            </div>
        </div>
        @endsection