<?php
function validatePhoneNumber($phoneNumber) {
 if (!preg_match("/^[0-9]{11}$/",$phoneNumber)){
		?>
    <script type="text/javascript">
	alert("Please enter Correct GSM Number!");
	history.back();
	</script>
    <?php 
	exit();
	}   
}
function testInput($dataInput)
    {
    $data1 = addslashes($dataInput);
    $data2 = trim($data1);
    $data3 = htmlspecialchars($data2);                    
    return $data3;
    }
            
function validateEmailAddress($emailAddress) {
 if (!preg_match("/^[a-z,0-9,.]+@[a-z]+(\.[a-z]+)+$/",$emailAddress)){
		?>
    <script type="text/javascript">
	alert("Please enter Correct E-Mail Address!");
	history.back();
	</script>
    <?php 
	exit();
	}   
}

function countAllSchools(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  schools ";
$result = $mysqli->query($sql);
$allSchools = $result->num_rows;
return $allSchools;
}

function countAllSchoolsCat($cat){
require '../database/database-connection.php';
$sql = "SELECT * FROM  schools WHERE schoolCategory='$cat'";
$result = $mysqli->query($sql);
$allSchoolsCat = $result->num_rows;
return $allSchoolsCat;
}

function countAllLGA(){
require '../database/database-connection.php';
$sql = "SELECT distinct hQtrsLGA FROM  schools ";
$result = $mysqli->query($sql);
$allLGA = $result->num_rows;
return $allLGA;
}
function countAllTeachers(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers ";
$result = $mysqli->query($sql);
$allTeachers = $result->num_rows;
return $allTeachers;
}

function countAllFemaleTeachers(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers WHERE teacherGender='Female' ";
$result = $mysqli->query($sql);
$allFemaleTeachers = $result->num_rows;
return $allFemaleTeachers;
}

function countAllMaleTeachers(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers WHERE teacherGender='Male' ";
$result = $mysqli->query($sql);
$allMaleTeachers = $result->num_rows;
return $allMaleTeachers;
}
function countAllStudents(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students";
$result = $mysqli->query($sql);
$allStudents = $result->num_rows;
return $allStudents;
}

function countAllFemaleStudents(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students WHERE studentGender='Female' ";
$result = $mysqli->query($sql);
$allFemaleStudents = $result->num_rows;
return $allFemaleStudents;
}

function countAllMaleStudents(){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students WHERE studentGender='Male' ";
$result = $mysqli->query($sql);
$allMaleStudents = $result->num_rows;
return $allMaleStudents;
}

function countSchoolBranch($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  schoolbranch WHERE sID=$sID ";
$result = $mysqli->query($sql);
$schoolBranch = $result->num_rows;
return $schoolBranch;
}

function selectSchoolName($sID){
require '../database/database-connection.php';
$sql = "SELECT schoolName FROM  schools WHERE sID=$sID ";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
     $schoolName = $row['schoolName'];
  }
return $schoolName;
}

function schoolSubjectList($sID){
require  '../database/database-connection.php';
$sql = "SELECT * FROM  subjects WHERE sID=$sID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td>'.$row["subjectName"].'</td>
        <td><a href="subject-delete.php?suID='.$row["suID"].'" title="Delete '.$row["subjectName"].'">Remove Subject</a></td></tr>';
        }
}
function schoolSubjectListB($sID){
require  '../database/database-connection.php';
$sql = "SELECT * FROM  subjects WHERE sID=$sID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc())
		{
        echo '
        <option value="'.$row["subjectName"].'">'.$row["subjectName"].'</option>';
                }
}

function countSchoolTeachers($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers WHERE sID=$sID ";
$result = $mysqli->query($sql);
$schoolTeachers = $result->num_rows;
return $schoolTeachers;
}

function countSchoolMaleTeachers($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers WHERE teacherGender='Male' AND  sID=$sID";
$result = $mysqli->query($sql);
$schoolMaleTeachers = $result->num_rows;
return $schoolMaleTeachers;
}

function countSchoolFemaleTeachers($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  teachers WHERE teacherGender='Female' AND  sID=$sID";
$result = $mysqli->query($sql);
$schoolFemaleTeachers = $result->num_rows;
return $schoolFemaleTeachers;
}

function countSchoolStudents($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students WHERE sID=$sID ";
$result = $mysqli->query($sql);
$schoolStudents = $result->num_rows;
return $schoolStudents;
}

function countSchoolFemaleStudents($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students WHERE sID=$sID AND studentGender='Female' ";
$result = $mysqli->query($sql);
$schoolFemaleStudents = $result->num_rows;
return $schoolFemaleStudents;
}

function countSchoolMaleStudents($sID){
require '../database/database-connection.php';
$sql = "SELECT * FROM  students WHERE sID=$sID AND studentGender='Male' ";
$result = $mysqli->query($sql);
$schoolMaleStudents = $result->num_rows;
return $schoolMaleStudents;
}

function schoolBranches($sID){
require  '../database/database-connection.php';
$sql = "SELECT * FROM  schoolbranch WHERE sID=$sID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc())
		{
        echo '
        <option value="'.$row["bID"].'">'.$row["branchAddress"].", ".$row["branchLGA"].", ".$row["branchState"].'</option>';
                }
}

function schoolTeachersList($sID, $cat){
require  '../database/database-connection.php';
if($cat == 'All'){$sql = "SELECT * FROM  teachers WHERE sID=$sID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["fullName"].'</a></td>
         <td>'.$row["teacherGender"].'</td> <td>'.$row["highestQualification"].'</td><td>'.$row["emailAddress"].'</td>
        <td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["phoneNumber"].'</a></td></tr>';}}
if($cat == 'Female'){$sql = "SELECT * FROM  teachers WHERE sID=$sID AND teacherGender='Female'";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["fullName"].'</a></td>
         <td>'.$row["teacherGender"].'</td> <td>'.$row["highestQualification"].'</td><td>'.$row["emailAddress"].'</td>
        <td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["phoneNumber"].'</a></td></tr>';}}
if($cat == 'Male'){$sql = "SELECT * FROM  teachers WHERE sID=$sID AND teacherGender='Male'";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["fullName"].'</a></td>
         <td>'.$row["teacherGender"].'</td> <td>'.$row["highestQualification"].'</td><td>'.$row["emailAddress"].'</td>
        <td><a href="teacher-details.php?tID='.$row["tID"].'">'.$row["phoneNumber"].'</a></td></tr>';}}
}

function teacherName($tID){
require  '../database/database-connection.php';
$sql = "SELECT fullName FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherFullName = $row["fullName"];
return $teacherFullName;
}
}

function teacherRole($tID){
require  '../database/database-connection.php';
$sql = "SELECT teacherRole FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherRole = $row["teacherRole"];
return $teacherRole;
}
}

function teacherGender($tID){
require  '../database/database-connection.php';
$sql = "SELECT teacherGender FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherGender = $row["teacherGender"];
return $teacherGender;
}
}
function highestQualification($tID){
require  '../database/database-connection.php';
$sql = "SELECT highestQualification FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$highestQualification = $row["highestQualification"];
return $highestQualification;
}
}

function contactAddress($tID){
require  '../database/database-connection.php';
$sql = "SELECT contactAddress FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$contactAddress = $row["contactAddress"];
return $contactAddress;
}
}


function stateOfResidence($tID){
require  '../database/database-connection.php';
$sql = "SELECT stateOfResidence FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$stateOfResidence = $row["stateOfResidence"];
return $stateOfResidence;
}
}

function LGAofResidence($tID){
require  '../database/database-connection.php';
$sql = "SELECT LGAofResidence FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$LGAofResidence = $row["LGAofResidence"];
return $LGAofResidence;
}
}

function teacherPhoneNumber($tID){
require  '../database/database-connection.php';
$sql = "SELECT phoneNumber FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherPhoneNumber = $row["phoneNumber"];
return $teacherPhoneNumber;
}
}

function teacherEmailAddress($tID){
require  '../database/database-connection.php';
$sql = "SELECT emailAddress FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherEmailAddress = $row["emailAddress"];
return $teacherEmailAddress;
}
}

function teacherRegDate($tID){
require  '../database/database-connection.php';
$sql = "SELECT regDate FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherRegDate = $row["regDate"];
return $teacherRegDate;
}
}

function teacherPassport($tID){
require  '../database/database-connection.php';
$sql = "SELECT teacherPassport FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherPassport = $row["teacherPassport"];
return $teacherPassport;
}
}

function teacherSubject($tID){
require  '../database/database-connection.php';
$sql = "SELECT subjectTeacher FROM  teachers WHERE tID=$tID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$teacherSubject = $row["subjectTeacher"];
return $teacherSubject;
}
}

function schoolStudentsList($sID, $cat){
require  '../database/database-connection.php';
if($cat == 'All'){$sql = "SELECT * FROM  students WHERE sID=$sID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="student-details.php?stID='.$row["stID"].'">'.$row["studentFullName"].'</a></td>
         <td>'.$row["dateOfBirth"].'</td> <td>'.$row["studentClass"].'</td><td>'.$row["studentGender"].'</td>
        <td><a href="student-details.php?stID='.$row["stID"].'">'.$row["regNumber"].'</a></td></tr>';}}
if($cat == 'Female'){$sql = "SELECT * FROM  students WHERE sID=$sID AND studentGender='Female'";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="student-details.php?stID='.$row["stID"].'">'.$row["studentFullName"].'</a></td>
         <td>'.$row["dateOfBirth"].'</td> <td>'.$row["studentClass"].'</td><td>'.$row["studentGender"].'</td>
        <td><a href="student-details.php?stID='.$row["stID"].'">'.$row["regNumber"].'</a></td></tr>';}}
if($cat == 'Male'){$sql = "SELECT * FROM  students WHERE sID=$sID AND studentGender='Male'";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        echo '<tr><td><a href="student-details.php?stID='.$row["stID"].'">'.$row["studentFullName"].'</a></td>
         <td>'.$row["dateOfBirth"].'</td> <td>'.$row["studentClass"].'</td><td>'.$row["studentGender"].'</td>
        <td><a href="student-details.php?stID='.$row["stID"].'">'.$row["regNumber"].'</a></td></tr>';}}
}

function schoolStudentsListSearch($sID)
{
    require  '../database/database-connection.php';
    $sql = "SELECT * FROM  students WHERE sID=$sID";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc())
            {
            echo '<option value="'.$row["stID"].'">'.$row["studentFullName"].' '.$row["regNumber"].'</option>';
            }
}

function studentName($stID){
require  '../database/database-connection.php';
$sql = "SELECT studentFullName FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$fullName = $row["studentFullName"];
return $fullName;
}
}

function studentStatus($stID)
{
    require  '../database/database-connection.php';
    $sql = "SELECT studentStatus FROM  students WHERE stID=$stID ";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc())
            {
    $studentStatus = $row["studentStatus"];
    return $studentStatus;
            }
}

function studentAdmNumber($stID){
require  '../database/database-connection.php';
$sql = "SELECT regNumber FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$admNumber = $row["regNumber"];
return $admNumber;
}
}

function studentGender($stID){
require  '../database/database-connection.php';
$sql = "SELECT studentGender FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$studentGender = $row["studentGender"];
return $studentGender;
}
}

function dateOfBirth($stID){
require  '../database/database-connection.php';
$sql = "SELECT dateOfBirth FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$dateOfBirth = $row["dateOfBirth"];
return $dateOfBirth;
}
}

function stateOfOrigin($stID){
require  '../database/database-connection.php';
$sql = "SELECT stateOfOrigin FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$stateOfOrigin = $row["stateOfOrigin"];
return $stateOfOrigin;
}
}

function LGAofOrigin($stID){
require  '../database/database-connection.php';
$sql = "SELECT LGAofOrigin FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$LGAofOrigin = $row["LGAofOrigin"];
return $LGAofOrigin;
}
}

function homeAddress($stID){
require  '../database/database-connection.php';
$sql = "SELECT homeAddress FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$homeAddress = $row["homeAddress"];
return $homeAddress;
}
}

function phoneNumber($stID){
require  '../database/database-connection.php';
$sql = "SELECT phoneNumber FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$phoneNumber = $row["phoneNumber"];
return $phoneNumber;
}
}

function emailAddress($stID){
require  '../database/database-connection.php';
$sql = "SELECT emailAddress FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$emailAddress = $row["emailAddress"];
return $emailAddress;
}
}

function studentClass($stID){
require  '../database/database-connection.php';
$sql = "SELECT studentClass FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$studentClass = $row["studentClass"];
return $studentClass;
}
}

function studentPassport($stID){
require  '../database/database-connection.php';
$sql = "SELECT studentPassport FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$studentPassport = $row["studentPassport"];
return $studentPassport;
}
}

function academicSession($stID){
require  '../database/database-connection.php';
$sql = "SELECT academicSession FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$academicSession = $row["academicSession"];
return $academicSession;
}
}

function academicSessionTerm($stID){
require  '../database/database-connection.php';
$sql = "SELECT academicSessionTerm FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$academicSessionTerm = $row["academicSessionTerm"];
return $academicSessionTerm;
}
}

function regDate($stID){
require  '../database/database-connection.php';
$sql = "SELECT regDate FROM  students WHERE stID=$stID ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
$regDate = $row["regDate"];
return $regDate;
}
}
?>