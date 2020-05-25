
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />


	<title>
		Calendar
	</title>

	<link href='/assets/demo-to-codepen.css' rel='stylesheet' />

	<link href='https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css' rel='stylesheet' />

	<link href='https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.css' rel='stylesheet' />

	<link href='https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.css' rel='stylesheet' />

	<script src='/assets/demo-to-codepen.js'></script>

	<script src='https://unpkg.com/@fullcalendar/core@4.4.0/main.min.js'></script>

	<script src='https://unpkg.com/@fullcalendar/interaction@4.4.0/main.min.js'></script>

	<script src='https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.js'></script>

	<script src='https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.js'></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script>

		document.addEventListener('DOMContentLoaded', function() {
			var Calendar = FullCalendar.Calendar;
			var Draggable = FullCalendarInteraction.Draggable;

			var containerEl = document.getElementById('external-events');
			var calendarEl = document.getElementById('calendar');
			var checkbox = document.getElementById('drop-remove');

			// initialize the external events
			// -----------------------------------------------------------------

			new Draggable(containerEl, {
				itemSelector: '.fc-event',
				eventData: function(eventEl) {
					return {
						title: eventEl.innerText
					};
				}
			});

			// initialize the calendar
			// -----------------------------------------------------------------

			var calendar = new Calendar(calendarEl, {
				plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				editable: true,
				droppable: true, // this allows things to be dropped onto the calendar
				drop: function(info) {
					// is the "remove after drop" checkbox checked?
					if (checkbox.checked) {
						// if so, remove the element from the "Draggable Events" list
						info.draggedEl.parentNode.removeChild(info.draggedEl);
					}
				}
			});

			//Drag and select
			calendar = new FullCalendar.Calendar(calendarEl, {
				plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
				selectable: true,
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				select: function(info) {
					alert('selected ' + info.startStr + ' to ' + info.endStr);
				}
			});
			calendar.render();
		});

		var date_last_clicked = null;



	</script>
	<style>

		html, body {
			margin: 0;
			padding: 0;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
			font-size: 14px;
		}

		#external-events {
			position: fixed;
			z-index: 2;
			top: 20px;
			left: 20px;
			width: 150px;
			padding: 0 10px;
			border: 1px solid #ccc;
			background: #eee;
		}

		.demo-topbar + #external-events { /* will get stripped out */
			top: 60px;
		}

		#external-events .fc-event {
			margin: 1em 0;
			cursor: move;
		}

		#calendar-container {
			position: relative;
			z-index: 1;
			margin-left: 200px;
		}

		#calendar {
			max-width: 900px;
			margin: 20px auto;
		}

	</style>
</head>
<body>

<div id='external-events'>
	<p>
		<strong>Draggable Events</strong>
	</p>
	<div class='fc-event'>My Event 1</div>
	<div class='fc-event'>My Event 2</div>
	<div class='fc-event'>My Event 3</div>
	<div class='fc-event'>My Event 4</div>
	<div class='fc-event'>My Event 5</div>
	<p>
		<input type='checkbox' id='drop-remove' />
		<label for='drop-remove'>remove after drop</label>
	</p>
</div>

<div id='calendar-container'>
	<div id='calendar'>
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
					</div>
					<div class="modal-body">
						<?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
						<div class="form-group">
							<label for="p-in" class="col-md-4 label-heading">Event Name</label>
							<div class="col-md-8 ui-front">
								<input type="text" class="form-control" name="name" value="" id="name">
							</div>
						</div>
						<div class="form-group">
							<label for="p-in" class="col-md-4 label-heading">Description</label>
							<div class="col-md-8 ui-front">
								<input type="text" class="form-control" name="description" id="description">
							</div>
						</div>
						<div class="form-group">
							<label for="p-in" class="col-md-4 label-heading">Start Date</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="start_date" id="start_date">
							</div>
						</div>
						<div class="form-group">
							<label for="p-in" class="col-md-4 label-heading">End Date</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="end_date" id="end_date">
							</div>
						</div>
						<div class="form-group">
							<label for="p-in" class="col-md-4 label-heading">Delete Event</label>
							<div class="col-md-8">
								<input type="checkbox" name="delete" value="1">
							</div>
						</div>
						<input type="hidden" name="eventid" id="event_id" value="0" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Update Event">
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>


</html>
