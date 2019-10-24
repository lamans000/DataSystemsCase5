<?php
use Ramsey\Uuid\Uuid;
// // Step 0: Validate the incoming data
$guid = Uuid::uuid4()->toString(); // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'UPDATE Member SET firstName = ?, lastName = ? WHERE memberID = ?;'
);
$stmt->execute([
  $guid,
  $_POST['memberID'],
  $_POST['firstName'],
  $_POST['lastName']
  $_POST['dob'],
  $_POST['gender'],
  $_POST['startDate'],
  $_POST['street'],
  $_POST['city'],
  $_POST['state'],
  $_POST['zip'],
  $_POST['email'],
  $_POST['workPhoneNumber'],
  $_POST['mobilePhoneNumber'],
  $_POST['jobTitle'],
  $_POST['radioNumber'],
  $_POST['stationNumber']
  $_POST['isActive']
]);
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/?guid=' . $guid);
