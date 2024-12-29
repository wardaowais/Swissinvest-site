$(function () {
    var icons = {
        header: "ui-icon-plus",
        activeHeader: "ui-icon-minus"
    };
    $(".accordion").accordion({
        icons: icons
    });
    $("#toggle").button().on("click", function () {
        if ($(".accordion").accordion("option", "icons")) {
            $(".accordion").accordion("option", "icons", null);
        } else {
            $(".accordion").accordion("option", "icons", icons);
        }
    });
});


$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    items: 1,
});

$('.custom-select2').click(function () {
    $('.custom-options2').toggleClass('aaactive');
});



$(".tabs").tabs();






// calender plugin
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.calendar-plugin').forEach(plugin => {
        const dateOptionsContainer = plugin.querySelector('.date-options');
        const timeOptionsContainer = plugin.querySelector('.time-options');
        const dates = generateDateOptions();
        let dateIndex = 0;

        dates.forEach(date => {
            const dateDiv = document.createElement('div');
            dateDiv.classList.add('date-option');
            dateDiv.textContent = date;
            dateDiv.style.display = 'none'; // Initially hide all dates
            dateDiv.addEventListener('click', () => selectOption(dateDiv, 'date-option'));
            dateOptionsContainer.appendChild(dateDiv);
        });

        const updateDateDisplay = () => {
            dateOptionsContainer.querySelectorAll('.date-option').forEach((date, index) => {
                date.style.display = (index >= dateIndex && index < dateIndex + 5) ? 'inline-block' : 'none';
            });
        };

        updateDateDisplay();

        plugin.querySelector('.prev-date').addEventListener('click', () => {
            if (dateIndex > 0) {
                dateIndex--;
                updateDateDisplay();
            }
        });

        plugin.querySelector('.next-date').addEventListener('click', () => {
            if (dateIndex < dates.length - 5) {
                dateIndex++;
                updateDateDisplay();
            }
        });

        timeOptionsContainer.querySelectorAll('.time-option').forEach(timeDiv => {
            timeDiv.addEventListener('click', () => selectOption(timeDiv, 'time-option'));
        });
    });
});

function generateDateOptions() {
    const today = new Date();
    const dateOptions = [];
    for (let i = 0; i < 10000; i++) { // Generate 10 dates for the example
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        dateOptions.push(date.toDateString());
    }
    return dateOptions;
}

function selectOption(selectedDiv, className) {
    const options = selectedDiv.parentElement.getElementsByClassName(className);
    for (let option of options) {
        option.classList.remove('selected');
    }
    selectedDiv.classList.add('selected');
};





// custom search



document.addEventListener('DOMContentLoaded', () => {
    let searchInput = document.querySelector('.search-input-2');
    let dropdown = document.querySelector('.dropdownn-2');
    let suggestions = Array.from(document.querySelectorAll('.dropdownn-2 .suggestion'));

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        suggestions.forEach(suggestion => {
            if (suggestion.textContent.toLowerCase().includes(input)) {
                suggestion.style.display = 'block';
            } else {
                suggestion.style.display = 'none';
            }
        });

        const hasVisibleSuggestions = suggestions.some(suggestion => suggestion.style.display === 'block');
        dropdown.style.display = hasVisibleSuggestions ? 'block' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        suggestions.forEach(suggestion => {
            suggestion.style.display = 'block';
        });
        dropdown.style.display = 'block';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    suggestions.forEach(suggestion => {
        suggestion.addEventListener('click', () => {
            searchInput.value = suggestion.textContent;
            dropdown.style.display = 'none';
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    let searchInput = document.querySelector('.search-input-7');
    let dropdown = document.querySelector('.dropdownn-7');
    let suggestions = Array.from(document.querySelectorAll('.dropdownn-7 .suggestion'));

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        suggestions.forEach(suggestion => {
            if (suggestion.textContent.toLowerCase().includes(input)) {
                suggestion.style.display = 'block';
            } else {
                suggestion.style.display = 'none';
            }
        });

        const hasVisibleSuggestions = suggestions.some(suggestion => suggestion.style.display === 'block');
        dropdown.style.display = hasVisibleSuggestions ? 'block' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        suggestions.forEach(suggestion => {
            suggestion.style.display = 'block';
        });
        dropdown.style.display = 'block';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    suggestions.forEach(suggestion => {
        suggestion.addEventListener('click', () => {
            searchInput.value = suggestion.textContent;
            dropdown.style.display = 'none';
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    let searchInput = document.querySelector('.search-input-11');
    let dropdown = document.querySelector('.dropdownn-11');
    let suggestions = Array.from(document.querySelectorAll('.dropdownn-7 .suggestion'));

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        suggestions.forEach(suggestion => {
            if (suggestion.textContent.toLowerCase().includes(input)) {
                suggestion.style.display = 'block';
            } else {
                suggestion.style.display = 'none';
            }
        });

        const hasVisibleSuggestions = suggestions.some(suggestion => suggestion.style.display === 'block');
        dropdown.style.display = hasVisibleSuggestions ? 'block' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        suggestions.forEach(suggestion => {
            suggestion.style.display = 'block';
        });
        dropdown.style.display = 'block';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    suggestions.forEach(suggestion => {
        suggestion.addEventListener('click', () => {
            searchInput.value = suggestion.textContent;
            dropdown.style.display = 'none';
        });
    });
});


// location


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-input-3');
    const dropdown = document.querySelector('.dropdown-3');
    const options = Array.from(dropdown.children);

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        options.forEach(option => {
            if (option.textContent.toLowerCase().includes(input)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        const hasVisibleOptions = options.some(option => option.style.display === 'block');
        dropdown.style.display = hasVisibleOptions ? 'grid' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        options.forEach(option => {
            option.style.display = 'block';
        });
        dropdown.style.display = 'grid';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            searchInput.value = option.textContent;
            dropdown.style.display = 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-input-8');
    const dropdown = document.querySelector('.dropdown-8');
    const options = Array.from(dropdown.children);

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        options.forEach(option => {
            if (option.textContent.toLowerCase().includes(input)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        const hasVisibleOptions = options.some(option => option.style.display === 'block');
        dropdown.style.display = hasVisibleOptions ? 'grid' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        options.forEach(option => {
            option.style.display = 'block';
        });
        dropdown.style.display = 'grid';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            searchInput.value = option.textContent;
            dropdown.style.display = 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-input-12');
    const dropdown = document.querySelector('.dropdown-12');
    const options = Array.from(dropdown.children);

    const updateDropdown = () => {
        const input = searchInput.value.toLowerCase();

        options.forEach(option => {
            if (option.textContent.toLowerCase().includes(input)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        const hasVisibleOptions = options.some(option => option.style.display === 'block');
        dropdown.style.display = hasVisibleOptions ? 'grid' : 'none';
    };

    searchInput.addEventListener('input', updateDropdown);

    searchInput.addEventListener('focus', () => {
        options.forEach(option => {
            option.style.display = 'block';
        });
        dropdown.style.display = 'grid';
    });

    document.addEventListener('click', (event) => {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            searchInput.value = option.textContent;
            dropdown.style.display = 'none';
        });
    });
});

$(document).ready(function () {
    $('.suggestion').click(function () {
        var specialtyId = $(this).data('att');
        $('#specialtyId').val(specialtyId);

        var remotespecialtyId = $(this).data('att');
        $('#remotespecialtyId').val(remotespecialtyId);
    });

    $('.option').click(function () {
        var locationId = $(this).data('att');
        $('#locationId').val(locationId);
        var remotelocationId = $(this).data('att');
        $('#remotelocationId').val(remotelocationId);
    });

    $('.option').click(function () {
        var institutespecialtyId = $(this).data('att');
        $('#institutespecialtyId').val(institutespecialtyId);
        var institutelocationId = $(this).data('att');
        $('#institutelocationId').val(institutelocationId);
    });
});
