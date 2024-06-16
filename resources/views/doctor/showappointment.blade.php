<!DOCTYPE html>
<html lang="en">
<head>
    @include('doctor.css')
    <style>
        /* Add any custom styles here */
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('doctor.sidebar')
        @include('doctor.navbar')
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding-top:50px;">
                <table style="border: 2px solid blue;">
                    <tr style="background-color:blue;">
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Date</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px">Approved</th>
                        <th style="padding:10px">Canceled</th>
                        <th style="padding:10px">Send Mail</th>
                    </tr>
                    @foreach ($data as $appoint)
                    <tr align="center">
                        <td>{{$appoint->name}}</td>
                        <td>{{$appoint->phone}}</td>
                        <td>{{$appoint->email}}</td>
                        <td>{{$appoint->doctor}}</td>
                        <td>{{$appoint->date}}</td>
                        <td>{{$appoint->message}}</td>
                        <td id="status-{{$appoint->id}}">{{$appoint->status}}</td>
                        <td>
                            @if ($appoint->status != 'Approved' && $appoint->status != 'Canceled')
                                <button id="approve-{{$appoint->id}}" class="btn btn-success" onclick="updateStatus({{$appoint->id}}, 'approved')">Approved</button>
                            @endif
                        </td>
                        <td>
                            @if ($appoint->status != 'Approved' && $appoint->status != 'Canceled')
                                <button id="cancel-{{$appoint->id}}" class="btn btn-danger" onclick="updateStatus({{$appoint->id}}, 'canceled')">Canceled</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('emailview', $appoint->id) }}" class="btn btn-primary">Send Mail</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('doctor.script')
    <script>
        function updateStatus(id, action) {
            console.log(`Sending request to /${action}/${id}`); // Log the URL being requested
            fetch(`/${action}/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                    console.log(`Received response: ${data.status}`); // Log the response status
                    if (data.status === 'success') {
                        console.log('Hiding buttons'); // Log before hiding the buttons
                        document.getElementById(`approve-${id}`).style.display = 'none';
                        document.getElementById(`cancel-${id}`).style.display = 'none';
                        // Update the status cell
                        const statusCell = document.querySelector(`#status-${id}`);
                        if (statusCell) {
                            statusCell.innerText = data.appointment.status;
                        }
                    } else {
                        console.error('Error with request:', data); // Log any errors
                    }
                }).catch(error => console.error('Error:', error)); // Log any network errors
        }
    </script>
</body>
</html>
