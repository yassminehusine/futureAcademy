function generatePassword() {
    const passwordLength = 12; // Adjust the desired password length
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?";

    let password = "";
    for (let i = 0; i
        < passwordLength; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }

    document.getElementById("password").value
        = password;
    document.getElementById("confirm-password").value
        = password;

}
  var searchUrl = "{{ route('users.search') }}";

  $(document).ready(async function() {
    $('#user_search').keyup(function() {
      var searchTerm = $(this).val();

        $.ajax({
        url: searchUrl, // Use the searchUrl variable
        data: { search: searchTerm },
        method: 'GET',
        dataType: 'json', // Assuming JSON response
        success: function(response) {
          console.log('Response:', response);
          // ... update UI with results
        },
        error: function(error) {
          console.error('Error sending AJAX request:', error);
        }
      });
    });
  });

  $(document).ready(function() {
    // Update notification count when new notifications are received
    function updateNotificationCount(count) {
      $('#notificationCount').text(count);
    }
  
    // Example: Fetch notifications and update count
    $.ajax({
      url: '/notifications', // Replace with your endpoint
      method: 'GET',
      success: function(response) {
        updateNotificationCount(response.unreadCount);
        // Update notification dropdown content with response data
      },
      error: function(error) {
        console.error('Error fetching notifications:', error);
      }
    });
  });