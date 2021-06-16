function setDeleteAction() {
    if(confirm("Kas olete kindel, et soovite valitud read kustutada?")) {
    document.frmStudents.action = "DeleteMultiple.php";
    document.frmStudents.submit();
    }
}