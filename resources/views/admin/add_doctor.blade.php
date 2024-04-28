<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Doctor</title>
    <style>
       
        label {
            display: inline-block;
            width: 200px;
            
        }
        .container {
            padding-top: 100px;
            text-align: center;
        }
        .form-group {
            padding: 15px;
        }
        .btn-submit {
            margin-top: 15px;
        }
        


    </style>
    <!-- Include external CSS and scripts -->
    @include('admin.css')
</head>
<body>
    <div class="container-scroller">
        <!-- Sidebar and Navbar -->
        @include('admin.sidebar')
        @include('admin.navbar')
        <!-- Content -->
        <div class="container-fluid page-body-wrapper">
            <div class="container">
                <!-- Display success message if available -->
                @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <!-- Doctor Upload Form -->
                <form action="{{ url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input style="color: black;" type="text" name="name" placeholder="Enter the name" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input style="color: black;" type="number" name="phone" placeholder="Enter the phone number" required>
                    </div>
                    <div class="form-group">
                        <label>Speciality</label>
                        <select name="speciality" style="color: black;" required>
                            <option value="">-- Select Speciality --</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Room No</label>
                        <input style="color: black;" type="text" name="room" placeholder="Enter the room number" required>
                    </div>
                    <div class="form-group">
                        <label>Doctor Image</label>
                        <input type="file" name="file" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Include external scripts -->
    @include('admin.script')
</body>
</html>
