function showLoadingScreen() {
    swal({
        title: "Filing your Report",
        text: "Please wait...",
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
    });
}

document.getElementById("report-btn").addEventListener("click", async function (event) {
    event.preventDefault();

    if (!document.getElementById("report-form").checkValidity()) {
        swal({
            title: "Unable to Submit",
            text: "Please fill out all required fields correctly.",
            icon: "error",
        });
        return;
    }

    if (!document.getElementById("agreeCheckbox").checked) {
        swal({
            title: "Unable to Submit",
            text: "You must agree to the Terms and Conditions",
            icon: "error",
        });
        return;
    }

    this.disabled = true;

    showLoadingScreen();

    try {
        var formData = new FormData(document.querySelector("form"));

        const response = await fetch("BACKEND/insert_report.php", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();

        if (data.success) {
            const trackingId = data.tracking_id;

            swal({
                title: "Reported Successfully!",
                text: `${data.message}\nHere's your Tracking ID: ${trackingId}`,
                icon: "success",
                buttons: {
                    copy: {
                        text: "Copy ID",
                        value: "copy",
                    },
                    proceed: {
                        text: "Proceed",
                        value: "proceed",
                    },
                },
                customClass: {
                    content: 'tracking-id-modal'
                },
            }).then((value) => {
                if (value === "copy") {
                    copyToClipboard(trackingId);
                } else if (value === "proceed") {
                    window.location.href = "home_ocrs.php";
                }
            });
        } else {
            swal({
                title: "Error!",
                text: data.message,
                icon: "error",
            });
        }
    } catch (error) {
        console.error("Error:", error);
        swal({
            title: "Error",
            text: "An unexpected error occurred. Please try again.",
            icon: "error",
        });
    } finally {
        this.disabled = false;
    }
});

function copyToClipboard(text) {
    const tempInput = document.createElement("textarea");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    swal({
        title: "Copied!",
        text: "Tracking ID has been copied to the clipboard",
        icon: "success",
    }).then(() => {
        window.location.href = "home_ocrs.php";
    });
}

const agreeCheckbox = document.getElementById('agreeCheckbox');
const showTermsLink = document.getElementById('showTerms');
const overlay = document.getElementById('overlay');

showTermsLink.addEventListener('click', function (event) {
    event.preventDefault();
    overlay.style.display = 'flex';
});

function closeModal() {
    overlay.style.display = 'none';
}

function agreeAndClose() {
    agreeCheckbox.checked = true;
    closeModal();
}



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
        if (value.length !== maxLength) {
            input.setCustomValidity(`Phone number must be exactly ${maxLength} digits.`);
            if (value.length > maxLength) {
                value = value.slice(0, maxLength);}
        } else {
            input.setCustomValidity('');
        }
    input.reportValidity();
    input.value = value;
}
