// add a new user
$(document).on('click', '.add-modal', function () {
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function () {
    $.ajax({
        type: 'POST',
        url: 'api/users',
        data: {
            'first_name': $('#firstname_add').val(),
            'last_name': $('#lastname_add').val(),
            'email': $('#email_add').val()
        },
        success: function (data) {
            if ((data.errors)) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 2000});
                }, 500);

            } else {
                toastr.success('Successfully added User!', 'Success Alert', {timeOut: 5000});
                $('#userTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.first_name + "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-first_name='" + data.first_name + "' data-last_name='" + data.last_name + "' data-email='" + data.email + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        },
    });
});


// Edit a user
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('Edit');
    $('#id_edit').val($(this).data('id'));
    $('#firstname_edit').val($(this).data('first_name'));
    $('#lastname_edit').val($(this).data('last_name'));
    $('#email_edit').val($(this).data('email'));
    id = $('#id_edit').val();
    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'PUT',
        url: 'api/users/' + id,
        data: {
            'id': $("#id_edit").val(),
            'first_name': $('#firstname_edit').val(),
            'last_name': $('#lastname_edit').val(),
            'email': $('#email_edit').val(),
        },
        success: function (data) {
            toastr.success('Successfully updated User!', 'Success Alert', {timeOut: 5000});
            $('.item' + id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.first_name + "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-first_name='" + data.first_name + "'  data-last_name='" + data.last_name + "' data-email='" + data.email + "'><span class='glyphicon glyphicon-edit'></span> Edit</button><button class='delete-modal btn btn-danger' data-id='" + data.id + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

        }
    });
});

// Delete a post
$(document).on('click', '.delete-modal', function () {
    $('.modal-title').text('Delete');
    $('#id_delete').val($(this).data('id'));
    $('#deleteModal').modal('show');
    id = $(this).data("id");
});
$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'DELETE',
        url: 'api/users/' + id,
        data: {
            'id': id,
        },
        success: function (data) {
            toastr.success('Successfully deleted User!', 'Success Alert', {timeOut: 5000});
            $('.item' + id).remove();
        }
    });
});
