<?php
include_once 'resource/Database.php' ;
include_once 'resource/utilities.php';
include_once 'resource/session.php';
$i=0;
$sql="SELECT * From message  where status='0' ORDER  BY date DESC ";
$query=$db->prepare($sql);
$query->execute();


?>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel="stylesheet" href="inc/bootstrap.min.css">
        <script src="inc/jquery.min.js"></script>
        <script src="inc/popper.min.js"> </script>
        <script src="inc/bootstrap.min.js"></script>
    </head>
    <body>
       <table class='table table-dark table-hover' style='max-width:100%;text-align:center;'>
    <thead>
      <tr>
        <th>Serial</th>
        <th>Subject</th>
        <th>Email</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
        <?php while($row=$query->fetch()){ $i++; ?>
           <tr>
        <td><?php echo $i; ?> </td>
         <td><?Php echo $row['subject']; ?></td>
        <td><?php echo short_text($row['comment'],30); ?></td>
        <td><?Php echo $row['date']; ?></td>
               <td><a href="view.php?msgid=<?php echo $row['ID']; ?>">View</a> ||<a href="delete.php?msgid=<?php echo $row['ID']; ?>"> Delete</a> ||<a href="?msgid=<?php echo $row['ID']; ?>"> Seen</td>
      </tr>
        <?php } ?>
        </table>
        

     </body>
</html>