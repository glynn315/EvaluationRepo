SELECT classassignmentform.classID,classformtable.courseCode,pippersonalinfo.pipYear,COUNT(pippersonalinfo.studentID) FROM classassignmentform INNER JOIN classformtable ON classformtable.classID = classassignmentform.classID LEFT JOIN pippersonalinfo ON pippersonalinfo.courseCode = classformtable.courseCode LEFT JOIN facultyformtable ON facultyformtable.facultyId = classassignmentform.facultyId WHERE pippersonalinfo.pipYear = '2nd Year' GROUP BY classassignmentform.classID; 



