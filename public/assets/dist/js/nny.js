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
// $(document).ready(function() {
//   $('#user_search').keyup(function() {
//     var searchTerm = $(this).val();

//     $.ajax({
//       url: "{{ route('users.search') }}", // Ensure correct route
//       data: { search: searchTerm },
//       method: 'GET', // Adjust method if needed
//       success: function(response) {
//         // Handle successful response
//         console.log('Response:', response);
//         // ... update UI with results
//       },
//       error: function(error) {
//         console.error('Error sending AJAX request:', error);
//       }
//     });
//   });
// });