

let eventGuid = 0
// let todayStr = new Date().toISOString().replace(/T.*$/, '') // YYYY-MM-DD of today
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
export const INITIAL_EVENTS = [
  {
    id: 153,
    title: 'All Day Event',
    start: new Date(y, m, 1),
    className: 'bg-soft-primary',
    location: 'San Francisco, US',
    allDay: false,
    extendedProps: {
        department: 'All Day Event'
    },
    description: 'An all-day event is an event that lasts an entire day or longer'
},
{
    id: 136,
    title: 'Visit Online Course',
    start: new Date(y, m, d - 5),
    end: new Date(y, m, d - 2),
    allDay: false,
    className: 'bg-soft-warning',
    extendedProps: {
        department: 'Long Event'
    },
    description: 'Long Term Event means an incident that last longer than 12 hours.'
},
{
    id: 999,
    title: 'Client Meeting with Alexis',
    start: new Date(y, m, d + 22, 20, 0),
    end: new Date(y, m, d + 24, 16, 0),
    allDay: false,
    className: 'bg-soft-danger',
    location: 'California, US',
    extendedProps: {
        department: 'Meeting with Alexis'
    },
    description: 'A meeting is a gathering of two or more people that has been convened for the purpose of achieving a common goal through verbal interaction, such as sharing information or reaching agreement.'
},
{
    id: 991,
    title: 'Repeating Event',
    start: new Date(y, m, d + 4, 16, 0),
    end: new Date(y, m, d + 9, 16, 0),
    allDay: false,
    className: 'bg-soft-primary',
    location: 'Las Vegas, US',
    extendedProps: {
        department: 'Repeating Event'
    },
    description: 'A recurring or repeating event is simply any event that you will occur more than once on your calendar. ',
},
{
    id: 112,
    title: 'Meeting With Designer',
    start: new Date(y, m, d, 12, 30),
    allDay: false,
    className: 'bg-soft-success',
    location: 'Head Office, US',
    extendedProps: {
        department: 'Meeting'
    },
    description: 'Tell how to boost website traffic'
},
{
    id: 113,
    title: 'Weekly Strategy Planning',
    start: new Date(y, m, d + 9),
    end: new Date(y, m, d + 11),
    allDay: false,
    className: 'bg-soft-danger',
    location: 'Head Office, US',
    extendedProps: {
        department: 'Lunch'
    },
    description: 'Strategies for Creating Your Weekly Schedule'
},
{
    id: 875,
    title: 'Birthday Party',
    start: new Date(y, m, d + 1, 19, 0),
    allDay: false,
    className: 'bg-soft-success',
    location: 'Los Angeles, US',
    extendedProps: {
        department: 'Birthday Party'
    },
    description: 'Family slumber party – Bring out the blankets and pillows and have a family slumber party! Play silly party games, share special snacks and wind down the fun with a special movie.'
},
{
    id: 783,
    title: 'Click for Google',
    start: new Date(y, m, 28),
    end: new Date(y, m, 29),
    url: 'http://google.com/',
    className: 'bg-soft-dark',
},
{
    id: 456,
    title: 'Velzon Project Discussion with Team',
    start: new Date(y, m, d + 23, 20, 0),
    end: new Date(y, m, d + 24, 16, 0),
    allDay: false,
    className: 'bg-soft-info',
    location: 'Head Office, US',
    extendedProps: {
        department: 'Discussion'
    },
    description: 'Tell how to boost website traffic'
}
]

export function createEventId() {
  return String(eventGuid++)
}

export const categories = [
  {
      name: 'Danger',
      value: 'bg-danger'
  },
  {
      name: 'Success',
      value: 'bg-success'
  },
  {
      name: 'Primary',
      value: 'bg-primary'
  },
  {
      name: 'Info',
      value: 'bg-info'
  },
  {
      name: 'Dark',
      value: 'bg-dark'
  },
  {
      name: 'Warning',
      value: 'bg-warning'
  },
];