$(document).ready(function () {
    // Open the modal when the edit button is clicked
    $('body').on('click', '#edit-btn', function () {
        var id = $(this).closest('tr').find('td:eq(0)').text();
        var email = $(this).closest('tr').find('td:eq(1)').text();
        var comment = $(this).closest('tr').find('td:eq(2)').text();
        var commentDate = $(this).closest('tr').find('td:eq(3)').text();
        var displayComment = $(this).closest('tr').find('td:eq(4)').text();

        // Populate the modal with the data
        $('#edit-modal #id').val(id);
        $('#edit-modal #email').val(email);
        $('#edit-modal #comment').val(comment);
        $('#edit-modal #date').val(commentDate); // Assuming your date field has the id 'date'
        $('#edit-modal #displayComment').val(displayComment);

        // Show the modal
        $('#edit-modal').show();
    });

    // Close the modal when the cancel button is clicked
    $('#cancel-btn').click(function () {
        $('#edit-modal').hide();
    });

    // Handle save and delete actions
    $('#save-btn').click(function () {
        var updatedId = $('#edit-modal #id').val();
        var updatedEmail = $('#edit-modal #email').val();
        var updatedDisplayComment = $('#edit-modal #displayComment').val();

        // Send the updated data to the server using AJAX
        $.post('AD_BACKEND/updateComment.php', { id: updatedId, email: updatedEmail, displayComment: updatedDisplayComment }, function (data) {
            if (data === "Record updated successfully") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Updated successfully.',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then((result) => {
                    // Redirect to admin_comments.php
                    window.location.href = 'admin_comments.php';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update record.',
                });
            }
        });

        // Close the modal
        $('#edit-modal').hide();
    });

    $('#delete-btn').click(function () {
        var idToDelete = $('#edit-modal #id').val();

        // Display a confirmation prompt before deletion
        Swal.fire({
            title: 'Warning!',
            text: 'Are you sure you want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
            reverseButtons: true // Yes button on the right, Cancel button on the left
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, proceed with deletion
                $.post('AD_BACKEND/deleteComment.php', { id: idToDelete }, function (data) {
                    if (data === "Record deleted successfully") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Deleted successfully.',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then((result) => {
                            // Redirect to admin_comments.php
                            window.location.href = 'admin_comments.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to delete record.',
                        });
                    }
                });
            }
        });

        // Close the modal
        $('#edit-modal').hide();
    });
});
