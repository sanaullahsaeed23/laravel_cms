<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card {
            box-shadow: 0 8px 8px 10px rgba(87, 84, 84, 0.4);
            max-width: 250px;
            padding: 10px;
            margin: auto;
            text-align: center;
        }

        .avatar {
            width: 130px;
            height: 130px;
            border: 4px solid black;
            border-radius: 50%;
            font-size: 100px;
            margin: auto;
        }

        .designation {
            font-size: 18px;
        }

        .social {
            margin: 20px 0;
        }

        a {
            font-size: 26px;
            padding: 7px 12px;
            text-decoration: none;
            background-color: #04456f;
            color: white;
            border-radius: 10px;
        }

        a:hover {
            background-color: #00c8ff;
        }
    </style>
</head>

<body>
  @foreach($allData as $value)
    <h1 style="text-align: center;">Identity Card</h1>

    <div class="card">
        <div class="avatar">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <h1>Abdullah</h1>
        <div class="designation">
            Student of KIPS
        </div>
        
        <p>Roll-N0: {{ $value['student_id'] }}</p>
        <p>Contact: +91-XXXXXXXXXX</p>

        <p>Session: {{ $value['student_year']['name'] }}</p>
        <p>Class:  {{ $value['student_class']['name'] }}</p>


        
        
        <p>Email Id: support@topjsproject.com</p>
        
        <div class="social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
    </div>
    @endforeach

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

</body>

</html>