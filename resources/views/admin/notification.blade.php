@extends('admin.master')

@section('title', 'Notifications')


@section('content')

<div class="container-fluid main-content px-2 px-lg-4 pt-3 pt-lg-5 mt-5">
    <div class="row my-2 g-3 g-lg-4 contact-section">
        <div class="d-flex justify-content-center pb-4">
            <div class="col-xl-12 bg-card p-2 p-md-3 px-lg-4 rounded">
                <div class="d-flex flex-wrap align-items-center justify-content-between bottom-border">
                    <h3>Notification center</h3>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    @if ($notifications->isEmpty())
                    <p>No notifications to display.</p>
                    @else
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        @php
                        $notifications = $notifications->reverse();
                        @endphp
                        @foreach ($notifications as $notification)
                        <div class="bg-notification mb-3 flex-wrap flex-md-nowrap rounded px-2 px-md-3 py-4 d-flex align-items-center w-100 gap-2">
                            
                            
                            <img src="../assets/images/default/book.jpg" width="80" height="80" alt="Default Image">
                        
                            <div class="flex-grow-1">
                                <p class="pg-large mb-1">{{ $notification->name. ' ' .$notification->last_name }}</p>
                                <p class="pg-large mb-1">{{ $notification->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="dynamic-timestamp" data-timestamp="{{ $notification->created_at->toIso8601String() }}"></span>
                                        <span class="notification-dot"></span>
                                    </span>
                                    <span class="primary">{{ $notification->created_at->format('M d, Y') }}</span>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        function updateTimestamps() {
            // Find all elements with the class "dynamic-timestamp" and update their content
            document.querySelectorAll('.dynamic-timestamp').forEach(function(element) {
                var timestamp = element.getAttribute('data-timestamp');
                var currentTime = moment();
                var notificationTime = moment(timestamp);

                // Calculate the time difference
                var diffInDays = currentTime.diff(notificationTime, 'days');
                var diffInHours = currentTime.diff(notificationTime, 'hours');
                var diffInMinutes = currentTime.diff(notificationTime, 'minutes');

                var formattedTimestamp = '';

                if (diffInDays > 0) {
                    formattedTimestamp = diffInDays + ' days ago';
                } else if (diffInHours > 0) {
                    formattedTimestamp = diffInHours + ' hours ago';
                } else {
                    formattedTimestamp = diffInMinutes + ' minutes ago';
                }

                element.textContent = formattedTimestamp;
            });

            // Schedule the next update in 1 minute
            setTimeout(updateTimestamps, 60000); // 60000 milliseconds = 1 minute
        }

        // Initial call to start the timestamp updates
        updateTimestamps();
    </script>
    @endsection