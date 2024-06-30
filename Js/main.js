document.addEventListener("DOMContentLoaded", function() {
    const orangeCheckbox = document.getElementById('orange');
    const airtelCheckbox = document.getElementById('airtel');
    const telmaCheckbox = document.getElementById('telma');
    const telephoneContainer = document.getElementById('telephone-container');
    const telephoneInput = document.getElementById('telephone');

    function updateCheckboxes(selectedCheckbox, placeholder) {
        telephoneContainer.style.display = 'none';

        [orangeCheckbox, airtelCheckbox, telmaCheckbox].forEach(checkbox => {
            if (checkbox !== selectedCheckbox) {
                checkbox.checked = false;
                checkbox.nextElementSibling.style.transform = 'scale(1)';
            }
        });

        if (selectedCheckbox.checked) {
            telephoneContainer.style.display = 'block';
            telephoneInput.placeholder = placeholder;
            selectedCheckbox.nextElementSibling.style.transform = 'scale(1.1)';
        }
    }

    orangeCheckbox.addEventListener('change', function() {
        updateCheckboxes(orangeCheckbox, '032*******');
    });

    airtelCheckbox.addEventListener('change', function() {
        updateCheckboxes(airtelCheckbox, '033*******');
    });

    telmaCheckbox.addEventListener('change', function() {
        updateCheckboxes(telmaCheckbox, '034*******');
    });
});
