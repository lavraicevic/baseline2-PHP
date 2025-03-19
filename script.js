function validateForm() {

    let title = document.forms["todoForm"]["title"].value;
    let dueDate = document.forms["todoForm"]["due_date"].value;
    

    if (title.trim() === "" || dueDate.trim() === '') {
        alert("Please enter info")
        return false; 
    }

    let dueDateTimeStamp = new Date(dueDate);
    let todaysDate = new Date(); 

    todaysDate.setHours(0, 0, 0, 0);

    if (dueDateTimeStamp < todaysDate) {
        alert("Date cannot be in the past");
        return false;
    }
    return true; 
}