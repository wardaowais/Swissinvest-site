function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerIcon = document.getElementById('hamburgerIcon');
    const closeIcon = document.getElementById('closeIcon');

    sidebar.classList.toggle('active');

    // Toggle the icons
    if (sidebar.classList.contains('active')) {
        hamburgerIcon.style.display = 'none';
        closeIcon.style.display = 'block';
    } else {
        hamburgerIcon.style.display = 'block';
        closeIcon.style.display = 'none';
    }
}




//professional tools dropdown
document.addEventListener("DOMContentLoaded", function() {
    const professionalToolsMenu = document.getElementById('professionalToolsMenu');
    const chevronIcon = document.getElementById('chevronIcon');
    if($(professionalToolsMenu).hasClass('active'))
    {
    	professionalToolsMenu.style.display = 'block';
    	chevronIcon.classList.remove('fa-chevron-down');
    	chevronIcon.classList.add('fa-chevron-up');
    }else
    {
    	professionalToolsMenu.style.display = 'none';
    }
    // Initialize with the submenu visible by default
    
    //chevronIcon.classList.remove('fa-chevron-down');
    //chevronIcon.classList.add('fa-chevron-up');

    document.getElementById('professionalTools').addEventListener('click', function() {
        if (professionalToolsMenu.style.display === 'none') {
            professionalToolsMenu.style.display = 'block';
            chevronIcon.classList.remove('fa-chevron-down');
            chevronIcon.classList.add('fa-chevron-up');
        } else {
            professionalToolsMenu.style.display = 'none';
            chevronIcon.classList.remove('fa-chevron-up');
            chevronIcon.classList.add('fa-chevron-down');
        }
    });
});







// Calendar Rendering
const monthYear = document.getElementById('month-year');
const calendarBody = document.getElementById('calendar-body');
const prevMonthBtn = document.getElementById('prev-month');
const nextMonthBtn = document.getElementById('next-month');
let currentDate = new Date();

function renderCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth();

    monthYear.textContent = new Intl.DateTimeFormat('en', { month: 'long', year: 'numeric' }).format(date);

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();
    calendarBody.innerHTML = '';

    let row = document.createElement('tr');
    let dayCounter = 1;

    for (let i = 0; i < firstDay; i++) {
        row.appendChild(document.createElement('td'));
    }

    for (let i = firstDay; i < 7; i++) {
        const cell = document.createElement('td');
        cell.textContent = dayCounter;

        if (i === 0) cell.style.color = 'white';
        if (dayCounter === new Date().getDate() && month === new Date().getMonth()) {
            cell.classList.add('current-day');
        }

        row.appendChild(cell);
        dayCounter++;
    }
    calendarBody.appendChild(row);

    while (dayCounter <= lastDate) {
        row = document.createElement('tr');
        for (let i = 0; i < 7 && dayCounter <= lastDate; i++) {
            const cell = document.createElement('td');
            cell.textContent = dayCounter;

            if (i === 0) cell.style.color = 'red';
            if (dayCounter === new Date().getDate() && month === new Date().getMonth()) {
                cell.classList.add('current-day');
            }

            row.appendChild(cell);
            dayCounter++;
        }
        calendarBody.appendChild(row);
    }
}

prevMonthBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
});

nextMonthBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
});

renderCalendar(currentDate);



