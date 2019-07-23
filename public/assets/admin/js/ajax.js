$.ajaxSetup({
 headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});
$('#edit').on('hidden.bs.modal', function() {
 jQuery('span').text('');
});
$('body').on('hidden.bs.modal', function() {
 jQuery('span').text('');
});
$(document).ready(function() {
 $('.error').hide();

 var update_id;

 function showCate() {
  $.ajax({
   url: 'admin/showCate',
   type: 'get',
   dataType: 'json',
   success: function($data) {
    $('#tableCate').empty();
    $.each($data, function(key, value) {
     var status = (value.status == 1) ? `<i class="fas fa-grin-beam" style="color:#61B38C; font-size:25px;"></i>` : `<i class="fas fa-angry" style="color:#E67569; font-size:25px;"></i>`
     var obj = ` 
           <tr>
              <td>` + parseInt(key + 1) + `</td>
              <td>` + value.name + `</td>
              <td>
                 ` + status + `
              </td>
              <td>
                  <button class="btn btn-success edit"title="sửa` + value.name + `" data-toggle="modal" data-target="#edit" type="button" data-id="` + value.id + `"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete" type="button"title="Xóa ` + value.name + `" data-id="` + value.id + `"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          `
     $('#tableCate').append(obj);
    });
   }
  })
 }
 showCate();
 //create
 $('#table').on('submit', function(event) {
  let name = $('.name-category').val();
  let status = $('.status-category').val();
  event.preventDefault();
  $.ajax({
   url: 'admin/category',
   type: 'post',
   dataType: 'json',
   processData: false,
   contentType: false,
   cache: false,
   data: new FormData(this),
   success: function($data) {
    console.log($data);
    $('#table')[0].reset();
    toastr.success($data.success, 'Thông báo', {
     timeOut: 5000
    });
    $('#add-category').modal('hide');
    showCate();
   },
   error: function(data) {
    console.log(data);
    let error = $.parseJSON(data.responseText);
    $('.error').show();
    $('.error').text(error.errors.name);
   }
  })
 });
 //edit
 $('body').on('click', '.edit', function(event) {
  $('.error').hide();
  let id = $(this).data('id');
  update_id = id;
  $.ajax({
   url: 'admin/category/' + id + '/edit',
   type: 'get',
   dataType: 'json',
   success: function($data) {
    $('.name').val($data.name);
    $('.id-category').val($data.id);
    $('.status').val($data.status);
   }
  });
 });
 //update
 $('.update').click(function() {
  $('.error').hide();
  $.ajax({
   url: 'admin/category/' + update_id,
   type: 'put',
   dataType: 'json',
   data: $('#form_category').serialize(),
   success: function($data) {
    toastr.success($data.success, 'Thông báo', {
     timeOut: 5000
    });
    $('#edit').modal('hide');
    
    showCate();
   },
   error: function(data) {
    console.log(data);
    let error = $.parseJSON(data.responseText);
    if (error.errors.name != "") {
     $('.error').show();
    $('.error').text(error.errors.name);
    }
    
   }

  });
  //delete
 });
 $('body').on('click', '.delete', function(event) {
  let id = $(this).data('id');
  $('.del').click(function(event) {
   $.ajax({
    url: 'admin/category/' + id,
    type: 'DELETE',
    dataType: 'json',
    // data: $('#form_category').serialize(),
    success: function($data) {
     toastr.success($data.success, 'Thông báo', {
      timeOut: 5000
     });
     $('#delete').modal('hide');
     showCate();
    }
   });
  });
 });
});