document.addEventListener('DOMContentLoaded', function () {
    var logoutBtn = document.getElementById('logout-btn');

        logoutBtn.addEventListener('click', function (event) {
            event.preventDefault();

            swal({
                title: "You will be logged out.",
                text: "Do you want to continue?",
                icon: "warning",
                buttons: ["Cancel", "Yes"],
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    window.location.href = "admin_login.php";
                }
            });
        });
    });