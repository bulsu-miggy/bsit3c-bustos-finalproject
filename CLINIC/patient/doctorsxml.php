<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .table-container {
      margin-top: 50px;
    }
    
    .table-container table {
      border-collapse: separate;
      border-spacing: 0;
      width: 100%;
    }
    
    .table-container table thead th {
      background-color: #007bff;
      color: #fff;
      border-color: #007bff;
    }
    
    .table-container table tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 123, 255, 0.1);
    }
    
    .table-container table tbody tr:hover {
      background-color: rgba(0, 123, 255, 0.2);
    }
    
    .table-container table th,
    .table-container table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        type: "GET",
        url: "../doctor/doctors.xml",
        dataType: "xml",
        success: function(xml) {
          var tableBody = $('#doctorsTable').find('tbody');
          
          $(xml).find('doctor').each(function(index) {
            var docid = $(this).find('docid').text();
            var docemail = $(this).find('docemail').text();
            var docname = $(this).find('docname').text();
            var specialties = $(this).find('specialties').text();
            
            var tableRow = "<tr>" +
                             "<td>" + docid + "</td>" +
                             "<td>" + docemail + "</td>" +
                             "<td>" + docname + "</td>" +
                             "<td>" + specialties + "</td>" +
                           "</tr>";
                           
            tableBody.append(tableRow);
          });
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  </script>
</head>
<body>
  <div class="container table-container">
    <table id="doctorsTable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Doctor ID</th>
          <th>Email</th>
          <th>Name</th>
          <th>Specialties</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>