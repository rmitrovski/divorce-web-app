function calculateWeeksDifference(registrationDate) {
    // Get the current date
    var currentDate = new Date();
    
    // Extract only the date part from the registration date
    registrationDate = new Date(registrationDate);
    registrationDate.setHours(0, 0, 0, 0);
  
    // Set the current date to the same time
    currentDate.setHours(0, 0, 0, 0);
  
    // Calculate the difference in milliseconds
    var interval = currentDate - registrationDate;
  
    // Calculate the difference in weeks
    var weeksDifference = Math.floor(interval / (7 * 24 * 60 * 60 * 1000));
  
    return weeksDifference;
  }
  
 
  
module.exports = calculateWeeksDifference;
