<?php
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query


if (isset($_GET['guid'])) {
  $stmt = $db->prepare(
    'SELECT * FROM Patient
    WHERE patientGuid = ?'
  );
  $stmt->execute([$_GET['memberID']]);
} else {
  $stmt = $db->prepare('SELECT m.memberID, m.firstName,m.lastName,m.dob,m.gender,m.startDate,m.street,m.city,m.state,m.zip,m.email,m.workPhoneNumber,m.mobilePhoneNumber,m.jobTitle,m.radioNumber,m.stationNumber,m.isActive,c.certificationName
  FROM Member as m, Certifications as c, MemberCertifications as mc
  WHERE m.memberID = mc.memberID AND c.certificationID = mc.certificationID;');
  $stmt->execute();
}
$patients = $stmt->fetchAll();
// Step 3: Convert to JSON
$json = json_encode($patients, JSON_PRETTY_PRINT);
// Step 4: Output
header('Content-Type: application/json');
echo $json;
