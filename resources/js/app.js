import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", async function () {
    let response = await axios.get("/get-events");
    let events = response.data.events;

    var calendarEl = document.getElementById("calendar");
    let nowDate = new Date();

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: "prev,next",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        views: {
            listDay: {
                buttonText: "Day",
            },
            listWeek: {
                buttonText: "Week",
            },
            listMonth: {
                buttonText: "Month",
            },
        },
        initialView: "timeGridWeek",
        slotMinTime: "08:00:00",
        slotMaxTime: "20:00:00",
        nowIndicator: true,
        selectable: true,
        selectMirror: true,
        selectOverlap: false,
        weekends: true,
        events: events,
        selectAllow: (info) => {
            return info.start >= nowDate;
        },
        select: (info) => {
            console.log("now date is " + nowDate);
            console.log("start date is " + info.start);
            let startTime = info.startStr.slice(0, info.startStr.length - 6);
            let endTime = info.endStr.slice(0, info.startStr.length - 6);

            start.value = startTime;
            end.value = endTime;
            submitBtn.click();
        },
    });

    calendar.render();

    function validateEventOwner(info) {
        let ownerId = info.event._def.extendedProps.owner;
        let authUser = authId.value;

        return ownerId == authUser;
    }



});
