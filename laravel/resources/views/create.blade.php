<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Form</title>
    <!-- BootStrap CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-2 mb-3">Add New Employee</h2>
        
        <form action="{{route('store')}}" method="post" enctype="multipart/form-data" class="w-50 m-auto mt-5 card border-0 shadow-lg" >
            <div class="p-3">
            <div class="pb-3 "><a href="{{url('/employees')}}" class="btn btn-info btn-sm">Back</a></div>
            
            @csrf
            <div class="row m-0">
            <div class="mb-3 col-6 p-0">
                <div class="pe-2">
                <label class="form-label"><b>Employee Name</b></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            </div>
            <div class="mb-3 col-6 p-0">
                <div class="ps-2">
                <label class="form-label"><b>Email</b></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            </div>
        </div>
            <div class="mb-3">
                <label class="form-label"><b>Gender</b></label> <br>
                <input type="radio" class="form-check-input" name="gender" value="Male"> <label class="me-5">Male</label>
                <input type="radio" class="form-check-input" name="gender" value="Female"> <label>Female</label>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Hobbies</b></label> <br>
                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Reading"> <label class="me-5">Reading</label>
                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Travelling"> <label class="me-5">Travelling</label>
                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Coding"> <label class="me-5">Coding</label>
                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Sports"> <label class="me-5">Sports</label>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Address</b></label>
                <textarea name="address" class="form-control" id="address" rows="5" style="max-height:60px"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Country</b></label>
                <select name="country" id="country" class="form-select">
                    <option disabled="disabled" selected>--- Select country ---</option>
                    <option value="India">India</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Egypt">Egypt</option>
                    <option value="France">France</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Image</b></label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3">
               <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        </form>

    </div>
</body>
</html>