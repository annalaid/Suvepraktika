function setDeleteAction() {
    if(confirm("Kas olete kindel, et soovite valitud read kustutada?")) {
    document.frmStudents.action = "DeleteStudent.php";
    document.frmStudents.submit();
    }
}