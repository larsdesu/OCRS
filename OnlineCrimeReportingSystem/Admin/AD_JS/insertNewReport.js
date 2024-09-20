document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("insertModal");
    var insertBtn = document.getElementById("insert-btn");

    var span = modal.querySelector(".close");

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    insertBtn.addEventListener("click", openModal);

    span.addEventListener("click", closeModal);

    window.addEventListener("click", function (event) {
        if (event.target == modal) {
            closeModal();
        }
    });

    var cancelBtn = document.getElementById("cancel-btn");
    if (cancelBtn) {
        cancelBtn.addEventListener("click", closeModal);
    }
});

        
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("createForm").addEventListener("submit", function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch(this.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                    }).then(() => {
                        window.location.reload(); 
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.message,
                        icon: "error",
                    });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});


document.getElementById('crimeType').addEventListener('input', function () {
    const input = this.value.toLowerCase();
    const suggestions = document.getElementById('crimeSuggestions').options;

    for (let i = 0; i < suggestions.length; i++) {
        const suggestion = suggestions[i].value.toLowerCase();
        const option = suggestions[i];

        if (suggestion.includes(input)) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    }
});


function limitDigits(input, maxLength) {
    let value = input.value.replace(/\D/g, '');

    if (value.length > maxLength) {
        value = value.slice(0, maxLength);
    }

    input.value = value;
}