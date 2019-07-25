$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
$("#edit").on("hidden.bs.modal", function() {
  jQuery("span").text("");
});
$("body").on("hidden.bs.modal", function() {
  jQuery("span").text("");
});
$(document).ready(function() {
  $(".error").hide();

  var update_id;

  function showCate() {
    $.ajax({
      url: "admin/showCate",
      type: "get",
      dataType: "json",
      success: function($data) {
        $("#tableCate").empty();
        $.each($data, function(key, value) {
          var status =
            value.status == 1
              ? `<i class="fas fa-grin-beam" style="color:#61B38C; font-size:25px;"></i>`
              : `<i class="fas fa-angry" style="color:#E67569; font-size:25px;"></i>`;
          var obj =
            ` 
           <tr>
              <td>` +
            parseInt(key + 1) +
            `</td>
              <td>` +
            value.name +
            `</td>
              <td>
                 ` +
            status +
            `
              </td>
              <td>
                  <button class="btn btn-success edit"title="sửa` +
            value.name +
            `" data-toggle="modal" data-target="#edit" type="button" data-id="` +
            value.id +
            `"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete" type="button"title="Xóa ` +
            value.name +
            `" data-id="` +
            value.id +
            `"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          `;
          $("#tableCate").append(obj);
        });
      }
    });
  }

  function showviewProductType() {
    $.ajax({
      url: "admin/showProductType",
      type: "get",
      dataType: "json",
      success: function($data) {
        $("#table-ProductType").empty();

        $.each($data.productType, function(key, value) {
          var category = $data.category.filter(function(check) {
            return check.id == value.idCategory;
          });

          var status =
            value.status == 1
              ? `<i class="fas fa-grin-beam" style="color:#61B38C; font-size:25px;"></i>`
              : `<i class="fas fa-angry" style="color:#E67569; font-size:25px;"></i>`;
          var obj =
            ` 
           <tr>
              <td>` +
            parseInt(key + 1) +
            `</td>
              <td>` +
            value.name +
            `</td>
              <td>` +
            category[0].name +
            `</td>
              <td>
                 ` +
            status +
            `
              </td>+
              <td>
                  <button class="btn btn-success editProductType"title="sửa` +
            value.name +
            `" data-toggle="modal" data-target="#editProductType" type="button" data-id="` +
            value.id +
            `"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger deleteProductType" data-toggle="modal" data-target="#deleteProductType" type="button"title="Xóa ` +
            value.name +
            `" data-id="` +
            value.id +
            `"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          `;
          $("#table-ProductType").append(obj);
        });
      }
    });
  }

  showCate();
  showviewProductType();
  //create
  $("#table").on("submit", function(event) {
    let name = $(".name-category").val();
    let status = $(".status-category").val();
    event.preventDefault();
    $.ajax({
      url: "admin/category",
      type: "post",
      dataType: "json",
      processData: false,
      contentType: false,
      cache: false,
      data: new FormData(this),
      success: function($data) {
        $("#table")[0].reset();
        toastr.success($data.success, "Thông báo", {
          timeOut: 5000
        });
        $("#add-category").modal("hide");
        showCate();
      },
      error: function(data) {
        let error = $.parseJSON(data.responseText);
        $(".error").show();
        $(".error").text(error.errors.name);
      }
    });
  });
  //edit
  $("body").on("click", ".edit", function(event) {
    $(".error").hide();
    let id = $(this).data("id");
    update_id = id;
    $.ajax({
      url: "admin/category/" + id + "/edit",
      type: "get",
      dataType: "json",
      success: function($data) {
        $(".name").val($data.name);
        $(".id-category").val($data.id);
        $(".status").val($data.status);
      }
    });
  });
  //update
  $(".update").click(function() {
    $(".error").hide();
    $.ajax({
      url: "admin/category/" + update_id,
      type: "put",
      dataType: "json",
      data: $("#form_category").serialize(),
      success: function($data) {
        toastr.success($data.success, "Thông báo", {
          timeOut: 5000
        });
        $("#edit").modal("hide");

        showCate();
      },
      error: function(data) {
        let error = $.parseJSON(data.responseText);
        if (error.errors.name != "") {
          $(".error").show();
          $(".error").text(error.errors.name);
        }
      }
    });
    //delete
  });
  $("body").on("click", ".delete", function(event) {
    let id = $(this).data("id");
    $(".del").click(function(event) {
      $.ajax({
        url: "admin/category/" + id,
        type: "DELETE",
        dataType: "json",
        success: function($data) {
          toastr.success($data.success, "Thông báo", {
            timeOut: 5000
          });
          $("#delete").modal("hide");
          showCate();
        }
      });
    });
  });
  //add Product
  $("#tableProductType").on("submit", function(event) {
    let name = $(".name-productType").val();
    let nameCategory = $(".name-Category").val();
    let status = $(".status-productType").val();
    event.preventDefault();
    $.ajax({
      url: "admin/producttype",
      type: "post",
      dataType: "json",
      processData: false,
      contentType: false,
      cache: false,
      data: new FormData(this),
      success: function($data) {
        $("#tableProductType")[0].reset();
        toastr.success($data.success, "Thông báo", {
          timeOut: 5000
        });
        $("#add-productType").modal("hide");
        showviewProductType();
      },
      error: function(data) {
        let error = $.parseJSON(data.responseText);
        console.log(error);
        $(".error").show();
        $(".error").text(error.errors.name);
      }
    });
  });
  //edit productType
  $("body").on("click", ".editProductType", function(event) {
    event.preventDefault();
    $(".error").hide();
    let id = $(this).data("id");
    update_id = id;
    $.ajax({
      url: "admin/producttype/" + update_id + "/edit",
      type: "get",
      dataType: "json",
      success: function($data) {
        console.log($data);
        $(".name").val($data.productType.name);
        $(".id-productType").val($data.productType.id);
        $(".status").val($data.productType.status);
      }
    });
    // update
  });
  $(".updateProductType").click(function() {
    $(".error").hide();
    $.ajax({
      url: "admin/producttype/" + update_id,
      type: "put",
      dataType: "json",
      data: $("#formProduct").serialize(),
      success: function($data) {
        toastr.success($data.success, "Thông báo", {
          timeOut: 5000
        });
        $("#editProductType").modal("hide");
        showviewProductType();
      },
      error: function(data) {
        console.log(data);
        let error = $.parseJSON(data.responseText);
        console.log(error);
        if (error.errors.name != "") {
          $(".error").show();
          $(".error").text(error.errors.name);
        }
      }
    });
  });
  $("body").on("click", ".deleteProductType", function(event) {
    let id = $(this).data("id");
    $(".delete").click(function(event) {
      $.ajax({
        url: "admin/producttype/" + id,
        type: "DELETE",
        dataType: "json",
        success: function($data) {
          toastr.success($data.success, "Thông báo", {
            timeOut: 5000
          });
          $("#deleteProductType").modal("hide");
          showviewProductType();
        }
      });
    });
  });
});
