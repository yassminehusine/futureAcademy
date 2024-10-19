<script>function generatePassword() {
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

}</script>
<script>
  var searchUrl = "{{ route('users.search') }}";
</script>

<script>
  $(document).ready(async function() {
    await $('#user_search').keyup(function() {
      var searchTerm = $(this).val();

       await $.ajax({
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
</script>