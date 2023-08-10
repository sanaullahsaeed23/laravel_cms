<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.container {
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}

#customers tr:hover {
  background-color: #ddd;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div class="container">
  <table id="customers">
    <tr>
    <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
      <td style="width: 70%;">
        <h2>Easy School ERP</h2>
        <p>School Address</p>
        <p>Phone: 343434343434</p>
        <p>Email: support@easylerningbd.com</p>
        <p><b>Student Exam Fee</b></p>
      </td>
    </tr>
  </table>

  @php 
  $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id', '3')->where('class_id', $details->class_id)->first();
  $originalfee = $registrationfee->amount;
  $discount = $details['discount']['discount'];
  $discounttablefee = $discount / 100 * $originalfee;
  $finalfee = (float) $originalfee - (float) $discounttablefee;
  @endphp 

  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Student ID No</b></td>
      <td>{{ $details['id'] }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Roll No</b></td>
      <td>{{ $details->student_id }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Session</b></td>
      <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Class</b></td>
      <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Exam Fee</b></td>
      <td>{{ $originalfee }} $</td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Discount Fee</b></td>
      <td>{{ $discount }} %</td>
    </tr>
    <tr>
      <td>9</td>
      <td><b>Fee For this Student of {{ $exam_type }}</b></td>
      <td>{{ $finalfee }} $</td>
    </tr>
  </table>
  <br><br>
  <p style="font-size: 10px; text-align: right;">Print Data: {{ date("d M Y") }}</p>

  <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
</div>
</body>
</html>
