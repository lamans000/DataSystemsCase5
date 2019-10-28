<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('UPDATE Member SET firstName = ?, lastName = ?, gender = ?, jobTitle = ?, startDate = ?, dob = ?, street = ?, city = ?, state = ?, zip = ?, email = ?, workPhoneNumber = ?, mobilePhoneNumber = ?, radioNumber = ?, stationNumber = ?, isActive = ? WHERE memberID = ?');

$stmt->execute([
  $_POST['firstName'],
  $_POST['lastName'],
  $_POST['gender'],
  $_POST['jobTitle'],
  $_POST['startDate'],
  $_POST['dob'],
  $_POST['street'],
  $_POST['city'],
  $_POST['state'],
  $_POST['zip'],
  $_POST['email'],
  $_POST['workPhoneNumber'],
  $_POST['mobilePhoneNumber'],
  $_POST['radioNumber'],
  $_POST['stationNumber'],
  $_POST['isActive'],
  $_POST['memberID']
]);
