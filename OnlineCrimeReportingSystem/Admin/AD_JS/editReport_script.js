var modal = document.getElementById('editModal');

function showCrimeImage() {
    var crimeImageContainer = document.getElementById('crimeImageContainer');
    crimeImageContainer.style.display = 'block';
}

function closeCrimeImage() {
    var crimeImageContainer = document.getElementById('crimeImageContainer');
    crimeImageContainer.style.display = 'none';
}

function showLoadingScreen() {
    Swal.fire({
        title: 'Saving Changes...',
        allowOutsideClick: false,
        onBeforeOpen: () => {
            Swal.showLoading();
        },
        showConfirmButton: false,
    });
}

function hideLoadingScreen() {
    Swal.close();
}

function openModal(rowId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('editModalData').innerHTML = xhr.responseText;
            modal.style.display = 'block';
        }
    };
    xhr.open('GET', 'AD_BACKEND/getReportrow.php?id=' + rowId, true);
    xhr.send();
}

function closeModal() {
    modal.style.display = 'none';
}

function saveData(id) {
    showLoadingScreen();

    var form = document.getElementById('editForm');
    var formData = new FormData(form);

    formData.append('id', id);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            hideLoadingScreen();
            closeModal();
            Swal.fire({
                icon: 'success',
                title: 'Saved!',
                text: 'Data has been saved successfully.',
            }).then(() => {
                window.location.href = 'admin_content.php';
            });
        }
    };

    xhr.open('POST', 'AD_BACKEND/updateReport.php', true);
    xhr.send(formData);
}

function deleteRow(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This data will be deleted.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            showLoadingScreen();

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    hideLoadingScreen();
                    closeModal();
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The row has been deleted.',
                    }).then(() => {
                        window.location.href = 'admin_content.php';
                    });
                }
            };

            xhr.open('POST', 'AD_BACKEND/deleteReport.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send('id=' + id);
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    var closeBtn = document.querySelector('.modal-content .close');

    closeBtn.onclick = function () {
        closeModal();
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            closeModal();
        }
    };

    var editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var rowId = button.getAttribute('data-id');
            openModal(rowId);
        });
    });
});
