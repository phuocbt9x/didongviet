var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setupAjax(url, data, method = 'POST'){
    return $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false,
        async: false
    });
}

function sendAjax(url, data, type, method = 'POST'){
    let resultAjax = this.setupAjax(url, data, method);
    resultAjax = JSON.parse(resultAjax.responseText);
    if(resultAjax.statusCode == 200){
        this.toastMessageSuccess(type);
        return resultAjax;
    }else{
        this.toastMessageError(type);
        let errors = resultAjax.errors;
        return errors;
    }
}

function deleteAjax(url) {
    var confirm = window.confirm('Bạn có muốn xóa dòng dữ liệu này! Sau khi xóa dữ liệu không thể khôi phục lại! Cẩn thận!');
    if (confirm) {
        if (confirm) {
            var ajax = $.ajax({
                url: url,
                data: { _method: 'delete' },
                method: 'delete',
                typeData: 'json',
                async: false
            });
            var status = (ajax.responseJSON).statusCode;
            if(ajax.status == 500){
                toastMessageDanger('Trường đang xóa liên quan đến các dữ liệu khác trong DB!');      
            }else{
                switch (status) {
                    case 200:
                        $('#dataTable').DataTable().clear().draw(true);
                        toastMessageSuccess('delete');
                        break;
                    case 400:
                        toastMessageError('delete');
                        break;
                    case 405:
                        toastMessageDanger('Bạn không có quyền để thực hiện chức năng này!');
                        break;
                    case 423:
                        toastMessageDanger('Bạn không thể xóa chính bản thân mình!');
                        break;
                }
            }
            
        }
    }
}


function toastMessageSuccess(type){
    switch(type){
        case 'create':
            Toast.fire({
                icon: 'success',
                title: 'Dữ liệu được thêm thành công!'
            })
            break;
        case 'update':
            Toast.fire({
                icon: 'success',
                title: 'Dữ liệu được cập nhật thành công!'
            })
            break;
        case 'delete':
            Toast.fire({
                icon: 'success',
                title: 'Dữ liệu được xóa thành công!'
            })
            break;
        case 'cartAdd':
            toastr.success('Sản phẩm đã được thêm vào giỏ hàng.');
            break;
        case 'cartUpdate':
            toastr.success('Giỏ hàng đã được cập nhật.');
            break;
        case 'cartDelete':
            toastr.success('Sản phẩm đã được xóa khỏi giỏ hàng.');
            break;
        default:
            break;
    }
}

function toastMessageError(type){
    switch(type){
        case 'create':
            Toast.fire({
                icon: 'error',
                title: 'Dữ liệu được thêm thất bại! Vui lòng kiểm tra và thử lại!'
            })
            break;
        case 'update':
            Toast.fire({
                icon: 'error',
                title: 'Dữ liệu được cập nhật thất bại! Vui lòng kiểm tra và thử lại!'
            })
            break;
        case 'delete':
            Toast.fire({
                icon: 'error',
                title: 'Dữ liệu được xóa thất bại! Vui lòng kiểm tra và thử lại!'
            })
            break;
        default:
            break;
    }
}

function toastMessage(message){
    toastr.success(message);
}

function toastMessageDanger(message){
    toastr.warning(message);
}

function renderData(url, columns){
    var table = $("#dataTable").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "orderable": false,
        "info": true,
        "autoWidth": false,
        "responsive": false,
        "processing": true,
        "serverSide": true,
        "bDestroy": true,
        "order": [[1, 'desc']],
        "scrollX": true,
        "columnDefs": [
            { "searchable": false, "targets": [0] }  // Disable search on first and last columns
          ],
        ajax: url,
        columns: columns,
      });
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    
}

function renderError(errorArray, elementArray) {
    elementArray.map(value => {
        if (errorArray[value]) {
            var element = document.getElementById(value);
            var elementError = document.getElementById(value + '-error');
            var spanError = `<span id="${value}-error" class="error invalid-feedback">${errorArray[value]}
        </span>`;
            if (elementError === null) {
                element.classList.add('is-invalid');
                element.insertAdjacentHTML('afterend', spanError);
            } else {
                elementError.remove();
                element.classList.add('is-invalid');
                element.insertAdjacentHTML('afterend', spanError);
            }

        }
    });
}

function removeError(elementArray) {
    elementArray.map(value => {
        var element = document.getElementById(value);
        var elementError = document.getElementById(value + '-error');
        console.log(element);
        if(element != null){
            element.classList.remove('is-invalid');
            if (elementError !== null) {
                elementError.remove();
            }
        }
    });
    document.getElementById('dataForm').reset();
}

function getAddress(cityId = -1, districtId = -1, wardId = -1) {
    fetch('https://provinces.open-api.vn/api/?depth=3')
        .then((response) => response.json())
        .then((data) => {
            var districts;
            data.map(value => {
                $('#city_id').append(`<option ${(value.code == cityId) ? 'selected' : -1} value="${value.code}">${value.name}</option>`);
            });
            if (districtId != -1) {
                $('#district_id').html('<option>Chọn quận/huyện</option>');
                $('#ward_id').html('<option> Chọn phường/xã </option>');
                data.map(value => {
                    if (value.code == cityId) {
                        districts = value.districts;
                        districts.map(value => {
                            $('#district_id').append(`<option ${(value.code == districtId) ? 'selected' : -1} value="${value.code}">${value.name}</option>`);
                        });
                    }
                })
            }
            $('#city_id').change(function () {
                $('#district_id').html('<option>Chọn quận/huyện</option>');
                $('#ward_id').html('<option> Chọn phường/xã </option>');
                let idCity = $(this).val();
                data.map(value => {
                    if (value.code == idCity) {
                        districts = value.districts;
                        districts.map(value => {
                            $('#district_id').append(`<option value="${value.code}">${value.name}</option>`);
                        });
                    }
                })
            });
            if (wardId != -1) {
                $('#ward_id').html('<option> Chọn phường/xã </option>');
                districts.map(value => {
                    if (value.code == districtId) {
                        ward = value.wards;
                        ward.map(value => {
                            $('#ward_id').append(`<option ${(value.code == wardId) ? 'selected' : -1} value="${value.code}">${value.name}</option>`);
                        });
                    }
                })
            }
            $('#district_id').change(function () {
                $('#ward_id').html('<option> Chọn phường/xã </option>');
                let idDistrict = $(this).val();
                districts.map(value => {
                    if (value.code == idDistrict) {
                        ward = value.wards;
                        ward.map(value => {
                            $('#ward_id').append(`<option value="${value.code}">${value.name}</option>`);
                        });
                    }
                })
            })
        });
}

function getFullAddress(elementShow, address, wardId, districtId, cityId) {
    fetch('https://provinces.open-api.vn/api/w/' + wardId)
        .then((response) => response.json())
        .then((data) => {
            ward = data.name;
            fetch('https://provinces.open-api.vn/api/d/' + districtId)
                .then((response) => response.json())
                .then((data) => {
                    district = data.name;
                    fetch('https://provinces.open-api.vn/api/p/' + cityId)
                        .then((response) => response.json())
                        .then((data) => {
                            city = data.name;
                            var element = document.getElementById(elementShow);
                            var addressFull;
                            if (address == '') {
                                addressFull = ward + ', ' + district + ', ' + city;
                            } else {
                                addressFull = address + ', ' + ward + ', ' + district + ', ' + city;
                            }
                            element.textContent += addressFull;
                        });
                });
        })
}


function preview(previewTag, type = 'user', tagImage = 'avatar') {
    $('#' + tagImage).change(function (e) {
        const preview = document.getElementById(previewTag);
        const imageOld = document.getElementById('preview-image')
        const files = e.target.files;
        const file = files[0];
        const fileReader = new FileReader();
        if (imageOld) {
            $('#preview-image').remove();
            fileReader.readAsDataURL(file);
            fileReader.onload = function () {
                const src = fileReader.result;
                switch (type) {
                    case 'user':
                        var tagImage = `<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Avatar(new) </label>
                                            <img style="width: 200px; height: 200px; object-fit: cover; " src="${src}" alt="${file.name}" class="rounded-circle  img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    case 'product':
                        var tagImage = `<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Product Image(new) </label>
                                            <img style="width: 250px; height: 350px; object-fit: cover; " src="${src}" alt="${file.name}" class="img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    case 'banner':
                         var tagImage = `<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Banner Image(new) </label>
                                            <img style="width: 350px; height: 250px; object-fit: cover; " src="${src}" alt="${file.name}" class="w-100 img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    default:
                        break;
                }
                preview.insertAdjacentHTML('beforeend', tagImage)
            }
        } else {
            fileReader.readAsDataURL(file);
            fileReader.onload = function () {
                const src = fileReader.result;
                switch (type) {
                    case 'user':
                        var tagImage = `<<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Avatar(new) </label>
                                            <img style="width: 200px; height: 200px; object-fit: cover; " src="${src}" alt="${file.name}" class="rounded-circle  img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    case 'product':
                        var tagImage = `<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Product Image(new) </label>
                                            <img style="width: 250px; height: 350px; object-fit: cover; " src="${src}" alt="${file.name}" class=" img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    case 'banner':
                        var tagImage = `<div class="d-flex align-items-start flex-column" id = 'preview-image'>
                                            <label>Banner Image(new) </label>
                                            <img style="width: 350px; height: 250px; object-fit: cover; " src="${src}" alt="${file.name}" class="w-100 img-thumbnail preview-img" />
                                        </div>
                                        `;
                        break;
                    default:
                        break;
                }
                preview.insertAdjacentHTML('beforeend', tagImage)
            }
        }
    })
}

function removeImage(preview){
    var preview = document.getElementById(preview);
    while (preview.hasChildNodes()) {
        preview.removeChild(preview.firstChild);
    }
}


// $(function() {
//     var Toast = Swal.mixin({
//       toast: true,
//       position: 'top-end',
//       showConfirmButton: false,
//       timer: 3000
//     });

//     $('.swalDefaultSuccess').click(function() {
//       Toast.fire({
//         icon: 'success',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultInfo').click(function() {
//       Toast.fire({
//         icon: 'info',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultError').click(function() {
//       Toast.fire({
//         icon: 'error',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultWarning').click(function() {
//       Toast.fire({
//         icon: 'warning',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultQuestion').click(function() {
//       Toast.fire({
//         icon: 'question',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });

//     $('.toastrDefaultSuccess').click(function() {
//       toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultInfo').click(function() {
//       toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultError').click(function() {
//       toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultWarning').click(function() {
//       toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });

//     $('.toastsDefaultDefault').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultTopLeft').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'topLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomRight').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomRight',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomLeft').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultAutohide').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         autohide: true,
//         delay: 750,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultNotFixed').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         fixed: false,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultFull').click(function() {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         icon: 'fas fa-envelope fa-lg',
//       })
//     });
//     $('.toastsDefaultFullImage').click(function() {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         image: '../../dist/img/user3-128x128.jpg',
//         imageAlt: 'User Picture',
//       })
//     });
//     $('.toastsDefaultSuccess').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-success',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultInfo').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-info',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultWarning').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-warning',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultDanger').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-danger',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultMaroon').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-maroon',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//   });