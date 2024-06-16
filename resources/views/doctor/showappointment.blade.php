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
                        <td>{{$appoint->status}}</td>
                        <td>
                            @if ($appoint->status != 'Approved' && $appoint->status != 'Canceled')
                                <form action="{{ url('approved', $appoint->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approved</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if ($appoint->status != 'Approved' && $appoint->status != 'Canceled')
                                <form action="{{ url('canceled', $appoint->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Canceled</button>
                                </form>
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
</body>
</html>
