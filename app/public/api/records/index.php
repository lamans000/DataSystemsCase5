<?php
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query


if (isset($_GET['guid'])) {
  $stmt = $db->prepare(
    'SELECT * FROM Member'
  );
  $stmt->execute([$_GET['memberID']]);
} else {
<<<<<<< HEAD
  $stmt = $db->prepare('SELECT m.memberID, m.firstName,m.lastName,m.dob,m.gender,m.startDate,m.street,m.city,m.state,m.zip,m.email,m.workPhoneNumber,m.mobilePhoneNumber,m.jobTitle,m.radioNumber,m.stationNumber,m.isActive,c.certificationName
  FROM Member as m, Certifications as c, MemberCertifications as mc
  WHERE m.memberID = mc.memberID AND c.certificationID = mc.certificationID;');
=======
  $stmt = $db->prepare('SELECT * FROM Member');
>>>>>>> Colin_10-16
  $stmt->execute();
}
$members = $stmt->fetchAll();
// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);
// Step 4: Output
header('Content-Type: application/json');
echo $json;
